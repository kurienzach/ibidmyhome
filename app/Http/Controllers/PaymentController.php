<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Auth;

use App\Project;
use App\Payment;

use Carbon\Carbon;

use Validator;

class PaymentController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    private function sendSmS($phoneno, $amount, $flat_id, $project){
        $sp_url     = "";
        $response   = "";
        $smsTxt = "We have received your payment of Rs. ".$amount.". One of our Relationship managers will get in touch with you shortly. Alternatively, you can reach us at 080 4455 5555";
        $sp_url = "http://trans.smscuppa.com/sendsms.jsp?user=purvnkra&password=purvnkra&mobiles=". $phoneno ."&sms=". urlencode($smsTxt) ."&senderid=PURVAA&version=3";
        
        if($sp_url != ""){
            //echo $sp_url;
            try {
                $ch     = curl_init();
                curl_setopt($ch, CURLOPT_URL, $sp_url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
                curl_setopt($ch,CURLOPT_TIMEOUT,10);
                //curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                //curl_setopt($ch, CURLOPT_NOSIGNAL, 1);

                set_time_limit(90);
                $response = curl_exec($ch);
                curl_close($ch);
                /*$response = file_get_contents($sp_url);*/
            }
            catch (Exception $e){
                return; 
            }
        }
        return $response;
    }

    /*
    *	Make sure all routes in this Controller can be access only using authenticated user
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    *	Show the payment page
    */
    public function show_payment(Request $request)
    {
        $user = Auth::user();
        if ($user->payment_done)
            return redirect('/');
        return view('payment.payment', compact('user'));
    }

    private function create_billdesk_msg($uniqueID, $name, $projectName, $amount) {

        $returnURL = 'http://ibidmyhome.com/payment/gateway';
        $billdeskData = 'PURAVANPRJ|'.'EOI'.$uniqueID.'|NA|' .$amount . '.00|NA|NA|NA|INR|NA|R|puravanprj|NA|NA|F|NA|NA|NA|NA|'.$uniqueID.'|'.$name.'|'.$projectName.'|'.$returnURL;
        $commonkey = "zegOdAeHXRNG";
        $checksum = hash_hmac('sha256',$billdeskData, $commonkey, false); 
        $checksum = strtoupper($checksum);
        $data = $billdeskData.'|'.$checksum;

        return $data; 
    }  

    /*
    *	Store user details and redirect to payment gateway page
    */
    public function payment_process(Request $request)
    {
        //return $request->all();
        if (!$request->has('AgreedTerms')) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Please accept the terms and conditions']); 
        }


        // Validations
        $validator = Validator::make(
            $request->all(),
            array(
                'CustName' => 'required',
                'CustPan' => 'required',
                'cust_mail' => 'required|email',
                'cust_mobile' => 'required',
                'CustAddress' => 'required',
                'CustCity' => 'required',
                'CustPincode' => 'required',
                'CustState' => 'required',
                'CustCountry' => 'required',
            ) 
        );

        $user = Auth::user();

        $booking = new Payment();

        // Project details
        $booking->project_id=$user->project_id;

        // Fill in customer details
        $booking->user_id = $user->id;
        $booking->cust_name = $request->get('cust_name');
        $booking->cust_mail = $request->get('cust_mail');
        $booking->cust_mobile = $request->get('cust_mobile');
        $booking->cust_address = $request->get('cust_address');
        $booking->city = $request->get('city');
        $booking->state = $request->get('state');
        $booking->country = $request->get('country');
        $booking->pincode = $request->get('pincode');
        $booking->panno = $request->get('panno');

        $booking->save();

        $booking->booking_id='IBIDMYHOME' . Carbon::now('Asia/Kolkata')->format('HisdmY') . $booking->id;
        $booking->paymentstatus="Pending";
        $booking->amount=25000.00;

        $booking->save();

            // Temp Code for testing
            //$booking->paymentstatus="Success";

            //$user = $booking->user()->first();

            //$user->mobile = $booking->cust_mobile;
            //$user->address = $booking->cust_address;
            //$user->city = $booking->city;
            //$user->state = $booking->state;
            //$user->country = $booking->country;
            //$user->pincode = $booking->pincode;
            //$user->payment_done = true;

            //$user->payment_id = $booking->id;

            //$user->save();

            //$booking->save();

            //return redirect('/');

        $msg = $this->create_billdesk_msg($booking->booking_id, $booking->cust_name, 'IBIDMYHOME', 2);

        return view('payment.process', ['msg' => $msg]);
    }

    public function gateway(Request $request)
    {
        //return $request->all();
        if (!$request->has('msg')) {
            return view('payment.gateway', ['msg' => 'An error occured during the payment process']);
        }

        list($dummy, $recordid, $payref1, $payref2, $amount, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $paystatuscode, $dummy, $dummy, $dummy, $dummy, $dummy, $recordidval, $name, $projectName, $dummy, $dummy,$payhashstr)=explode('|', $request->get('msg'));

        // Verify the response checksum before using the data
        $response_msg = explode('|', $request->get('msg'));
        $hash = $response_msg[sizeof( $response_msg ) - 1];

        $commonkey = "zegOdAeHXRNG";
        $checksum = strtoupper(hash_hmac('sha256', implode('|', array_slice($response_msg, 0, sizeof($response_msg) - 1)) , $commonkey, false)); 

        // The computed hash and the hash obtained does not match
        if ($hash != $checksum)
            return view('payment.gateway', ['msg' => 'An error occured during the payment process']);

        $booking = Payment::where('booking_id', 'EOI' . $recordid)->first();

        // Payment success
        if ($paystatuscode == '0300') {

            // Update bookings table to mark booking as success
            $booking->statuscode = $paystatuscode;
            $booking->txnreferenceno = $payref1;
            $booking->bankreferenceno = $payref2;
            $booking->paymentstatus="Success";

            $user = $booking->user()->first();

            $user->mobile = $booking->cust_mobile;
            $user->address = $booking->cust_address;
            $user->city = $booking->city;
            $user->state = $booking->state;
            $user->country = $booking->country;
            $user->pincode = $booking->pincode;
            $user->payment_done = true;

            $user->payment_id = $booking->id;

            $user->save();

            $booking->save();

            $this->sendSmS($booking->cust_mobile, $booking->amount, $booking->flat_id, 'The Tree');

            // Send email to customer
            Mail::send('mails.booking_success', ['booking' => $booking], function($m) {
                $m->to($booking->cust_mail, $booking->cust_name);
                $m->subject('Provident housing Flat Successfully booked');
            });
            // Send email to admin
            Mail::send('mails.new_booking', ['booking' => $booking], function($m) {
                $m->to('vantageview@providenthousing.com', 'Vantage View');
                $m->subject('New Booking in Project ' . $booking->project()->first()->name);
            });
            
            return redirect('/');
        }
        // Payment failure
        else {
            return view('payment.gateway', ['msg' => 'An error occured during the payment process']);
        }
        
    }
    
}
