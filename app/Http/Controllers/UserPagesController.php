<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\ProjectUnit;
use App\Bid;

use Auth;
use View;
use Mail;

class UserPagesController extends Controller
{
    private function sendSmS($phoneno, $user, $unit, $bid_value){
        $sp_url     = "";
        $response   = "";
        $smsTxt = "Dear " . $user . ", thank you for placing your bid on ibidmyhome.com. We have mailed you details of your chosen Property & your bid amount, for your reference.";
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

    // Returns the main index page
    public function index()
    {
        if (Auth::check() && !Auth::user()->payment_done) {
            return redirect('/payment'); 
        }

        $projects = Project::all()->groupBy('city')->toJSON();
        return view('user.index', compact('projects'));
    }

    public function bid()
    {
        if (!Auth::check() || !Auth::user()->payment_done) {
            return redirect('/');
        }

        $projects = Project::all();
        $units = ProjectUnit::all(['id','unit_type', 'area', 'project_id', 'min_bid_value', 'max_bid_value'])->groupBy('project_id');
        $user = Auth::user();

        return view('user.bid', compact('user', 'projects', 'units'));
    }

    public function place_bid(Request $request)
    {
        if (!Auth::check() || !Auth::user()->payment_done) {
            return redirect('/');
        }

        $user = Auth::user();

        // Verify the unit ID belongs to the project user selected
        $project_unit = ProjectUnit::findOrFail($request->get('unit_id'));
        // [TODO] Test if this check is  working
        if ($project_unit->project->id != Project::find($request->get('project_id'))->id) {
            return redirect('/bid');
        }

        // Verify the bid is a valid integer and is greater than min bid amount
        $bid_value = $request->get('bid_value');
        if (!is_numeric($bid_value) || $bid_value < $project_unit->min_bid_value || $bid_value > $project_unit->max_bid_value) {
            return redirect('/bid');
        }

        $is_new_bid = false;

        // Check if user already has placed a bid
        if ($user->bid == null) {
            $bid = new Bid();
            $request->session()->flash('alert', 'We will contact you shortly to complete your Bidding Process by collecting a booking cheque of Rs.3 lakh. Your cheque will not be banked without your consent.');
            $request->session()->flash('alert-title', 'Thank you for placing your bid');
            $is_new_bid = true;
        }
        // This is a modification to existing bid
        else {
            $bid = $user->bid()->first();
            $request->session()->flash('alert', 'Your bid has been successfully modified');
        }

        $bid->unit_id = $request->get('unit_id');
        $bid->bid_value = $request->get('bid_value');
        $bid->total_price = (int)$bid_value * $project_unit->area + $project_unit->other_charges + $project_unit->govt_charges;

        $bid->higher_floor = 0;
        $bid->premium_view = 0;

        // Higher floor and premium view
        if ($request->has('higher_floor')) {
            if ($request->get('higher_floor') == "yes") 
                $bid->higher_floor = 1;
            else
                $bid->higher_floor = -1;
        }
        if ($request->has('premium_view')) {
            if ($request->get('premium_view') == "yes") 
                $bid->premium_view = 1;
            else
                $bid->premium_view = -1;
        }

        $bid->save();

        $user->project_id = $request->get('project_id');
        $user->bid()->associate($bid);
        $user->save();

        $this->sendSmS($user->mobile, $user->name, $bid->project_unit->unit_type . ' (' . $bid->project_unit->area .')', $bid->bid_value);

        if ($is_new_bid) {
            // Send mail to admin
            Mail::send('mails.new_bid', ['user' => $user], function($m) use ($user){
                $m->to('nitin.verma@providenthousing.com', 'IBidMyHome');
                $m->cc('anamika.choudhary@puravankara.com', 'IBidMyHome');
                $m->cc('pavit.ponnanna@puravankara.com', 'IBidMyHome');                
                $m->subject('IBIDMYHOME Bid Placed');
            });
            
            // Send mail to user
	        Mail::send('mails.bid_first', ['user' => $user], function($m) use ($user){
	            $m->to($user->email, $user->name);
	            $m->subject('Ibidmyhome Bid confirmation');
	        });
        }
        else {
	        // Send mail to user
	        Mail::send('mails.bid_modified', ['user' => $user], function($m) use ($user){
	            $m->to($user->email, $user->name);
	            $m->subject('Ibidmyhome Bid Modified');
	        });
        }
      

        return redirect('/bid');
    }

    public function pages($page)
    {
        if (View::exists('user.static.'.$page))
            return view('user.static.'.$page);
        else
            abort(404);
    }
}
