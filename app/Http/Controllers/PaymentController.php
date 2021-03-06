<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Auth;

use Mail;

use App\Project;
use App\Payment;
use App\Coupon;

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

    private function sendSmS($phoneno, $user, $flat_id, $project){
        $sp_url     = "";
        $response   = "";
        $smsTxt = "Dear " . $user . ", thank you for registering with ibidmyhome.com.  You may now place your bid online or call us on +91 80 44559966 for assistance.";
        $sp_url = "http://trans.smscuppa.com/sendsms.jsp?user=mybids&password=mybids&mobiles=". $phoneno ."&sms=". urlencode($smsTxt) ."&senderid=MYBIDS&version=3";
        
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
        //$this->middleware('auth');
    }

    /*
    *	Show the payment page
    */
    public function show_payment(Request $request)
    {
    	if (!Auth::check()) {
    	    return redirect('/');
    	}
    	
        $user = Auth::user();
        if ($user->payment_done)
            return redirect('/bid');
            
        //if(Auth::user()->payment_id == null) {
            //$user = Auth::user();
            //$user->payment_id = 81;
            //$user->save();
            //$request->session()->flash('newpayment', 'Password reset mail send successfully');           	
        //}

        $projects = Project::all();
        return view('user.payment', compact('user', 'projects'));
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
        if (!Auth::check()) {
    	    return redirect('/');
    	}
    	
        //return $request->all();
        if (!$request->has('AgreedTerms')) {
            return redirect()->back()->withInput()->withErrors(['msg' => 'Please accept the terms and conditions']); 
        }

        // Validations
        $validator = Validator::make(
            $request->all(),
            array(
                'project_id' => 'required',
                'CustName' => 'required',
                'cust_mail' => 'required|email',
                'cust_mobile' => 'required',
                'CustCity' => 'required',
                'CustPincode' => 'required',
                'CustState' => 'required',
                'CustCountry' => 'required',
            ) 
        );

        $user = Auth::user();

        $booking = new Payment();

        // Project details
        // User can select a different project here
        $booking->project_id=$request->get('project_id');
        
        $user->project_id = $request->get('project_id');
        $user->save();

        // Fill in customer details
        $booking->heard_src = $request->get('heard_src');
        $booking->heard_field1 = $request->get('heard_field1');
        $booking->heard_field2 = $request->get('heard_field2');
        $booking->user_id = $user->id;
        $booking->cust_name = $request->get('cust_name');
        $booking->cust_mail = $request->get('cust_mail');
        $booking->cust_mobile = $request->get('cust_mobile');
        $booking->cust_address = '';
        $booking->city = $request->get('city');
        $booking->state = $request->get('state');
        $booking->country = $request->get('country');
        $booking->pincode = $request->get('pincode');
        $booking->panno = '';

        //$booking->save();

        $booking->booking_id='IBIDMYHOME' . Carbon::now('Asia/Kolkata')->format('HisdmY') . $booking->id;
        $booking->paymentstatus="Pending";
        $booking->amount=549.00;

        $booking->save();

        // Logic for coupon code
        if ($request->get('coupon_code')) {
            $coupon = Coupon::where('coupon_code', $request->get('coupon_code'))->first();

            if (isset($coupon)) {
                // Check if the coupon is used?
                if ($coupon->used) {
                    $request->session()->flash('no_login_error', '1');
                    return redirect()->back()->withInput()->withErrors(['msg' => 'Coupon is already used']); 
                }

                $booking->paymentstatus="Success (Coupon)";

                $user->mobile = $booking->cust_mobile;
                $user->address = $booking->cust_address;
                $user->city = $booking->city;
                $user->state = $booking->state;
                $user->country = $booking->country;
                $user->pincode = $booking->pincode;
                $user->payment_done = true;

                $user->payment_id = $booking->id;

                $coupon->used = true;
                $coupon->user_id = $user->id;

                $coupon->save();
                $user->save();
                $booking->save();

                return view('user.payment_success');
            }
            else {
                $request->session()->flash('no_login_error', '1');
                return redirect()->back()->withInput()->withErrors(['msg' => 'Invalid Coupon Code']); 
            }
        }

            // Temp Code for testing
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

            //return view('user.payment_success');

        $msg = $this->create_billdesk_msg($booking->booking_id, $booking->cust_name, 'IBIDMYHOME', $booking->amount);

        return view('user.payment_process', ['msg' => $msg]);
    }

    public function gateway(Request $request)
    {
        
        if (!$request->has('msg')) {
            return view('user.payment_error', ['msg' => 'An error occured during the payment process']);
        }

        list($dummy, $recordid, $payref1, $payref2, $amount, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $dummy, $paystatuscode, $dummy, $dummy, $dummy, $dummy, $dummy, $recordidval, $name, $projectName, $dummy, $dummy,$payhashstr)=explode('|', $request->get('msg'));

        // Verify the response checksum before using the data
        $response_msg = explode('|', $request->get('msg'));
        $hash = $response_msg[sizeof( $response_msg ) - 1];

        $commonkey = "zegOdAeHXRNG";
        $checksum = strtoupper(hash_hmac('sha256', implode('|', array_slice($response_msg, 0, sizeof($response_msg) - 1)) , $commonkey, false)); 

        // The computed hash and the hash obtained does not match
        if ($hash != $checksum)
            return view('user.payment_error', ['msg' => 'An error occured during the payment process']);
            
        $booking_id = substr($recordid, 3);

        $booking = Payment::where('booking_id', $booking_id)->first();
        
	$user = $booking->user()->first();
	
	if (!Auth::check()) {
	    Auth::login($user);
	}        

        // Payment success
        if ($paystatuscode == '0300') {
        
            // Update bookings table to mark booking as success
            $booking->statuscode = $paystatuscode;
            $booking->txnreferenceno = $payref1;
            $booking->bankreferenceno = $payref2;
            $booking->paymentstatus="Success";

            

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

            $this->sendSmS($booking->cust_mobile, $booking->cust_name, $booking->project->name, 'IBIDMYHOME');

            // Send email to customer
            Mail::send('mails.booking_success', ['booking' => $booking], function($m) use ($booking){
                $m->to($booking->cust_mail, $booking->cust_name);
                $m->subject('IBIDMYHOME Payment Confirmation');
            });
            // Send email to admin
            Mail::send('mails.new_booking', ['booking' => $booking], function($m) use ($booking) {
                $m->to('nitin.verma@providenthousing.com', 'IBidMyHome');
                $m->cc('anamika.choudhary@puravankara.com', 'IBidMyHome');
                $m->cc('pavit.ponnanna@puravankara.com', 'IBidMyHome');
                $m->subject('New Payment received' . $booking->project->name);
            });
            
            return view('user.payment_success');
        }
        // Payment failure
        else {
            return view('user.payment_error', ['msg' => 'An error occured during the payment process']);
        }
        
    }
    
}
