<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Bid;
use App\Payment;
use App\ProjectUnit;

use Response;

class AdminController extends Controller
{
    public function show_login()
    {
        return view('admin.login');
    }

    public function process_login(Request $request)
    {
        if ($request->email == "admin@ibidmyhome.com" && $request->password == "provid30") {
            $request->session()->put('admin', 'true');
            return redirect('/admin');
        }
        else {
            return back()->withInput()->withErrors(['Incorrect Username / Password!!']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('/admin/login');
    }

    public function index(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect('/admin/login');
        }

        $bids = Bid::all();
        return view('admin.index', compact('bids'));
    }

    public function bid(Request $request, $id)
    {
        if (!$request->session()->has('admin')) {
            return redirect('/admin/login');
        }

        $bid = Bid::findOrFail($id);
        return view('admin.bid_details', compact('bid'));
    }
    
    public function bid_csv(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect('/admin/login');
        }
        
        $users = User::all();
        $csv = "Register Timestamp\tUser Name\tEmail\tMobile\tAddress\tProject Name\tHeard From\tHeard From Name\tHeard From Mobile\tPAN No\tUnit Type\tBid Value\tHigher Floor\tPremium View\n";

        foreach ($users as $user) {
            // Add user details
            $csv .= $user->created_at . "\t";            
            $csv .= $user->name . "\t";
            $csv .= $user->email . "\t";
            $csv .= $user->mobile . "\t";
            
            
            $csv .= trim(preg_replace('/\s\s+/', ' ',$user->address)) . ',' . $user->city . ',' . $user->state . ',' . $user->country . ',' . $user->pincode . "\t";
            $csv .= $user->project->name . "\t";
            if ($user->payment) {
                $payment = $user->payment;
                $csv .= $payment->heard_src . "\t";
                $csv .= $payment->heard_field1 . "\t";
                $csv .= $payment->heard_field2 . "\t";
                $csv .= $payment->panno . "\t";
            }

            if ($user->bid) {
                $bid = $user->bid;
                $csv .= $bid->project_unit->unit_type . '(' . $bid->project_unit->area . ")\t";
                $csv .= $bid->bid_value . "\t";
                ($bid->higher_floor)?($csv .= "Yes\t"):($csv .= "No\t");
                ($bid->premium_view)?($csv .= "Yes\t"):($csv .= "No\t");
            }

            $csv .= "\n";
        }

        $response = Response::make($csv, 200);
        $response->header('content-type', 'application/csv');
        $response->header('content-disposition', "inline; filename='ibidmyhome_bids.csv'");
        return $response;

    }
    
    public function projects(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect('/admin/login');
        }

        $units = ProjectUnit::all();
        return view('admin.projects', compact('units'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function user_details($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user_details', compact('user'));
    }

    public function edit_unit(Request $request, $id)
    {
        if (!$request->session()->has('admin')) {
            return redirect('/admin/login');
        }

        $unit = ProjectUnit::find($id);
        return view('admin.edit_unit', compact('unit'));
    }

    public function save_unit(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect('/admin/login');
        }

        $unit = ProjectUnit::findOrFail($request->get('unit_id'));

        $unit->highest_bid = $request->get('highest_bid');
        $unit->min_bid_value = $request->get('min_bid_value');
        $unit->max_bid_value = $request->get('max_bid_value');
        $unit->save();
        return redirect('/admin/projects');
    }
}
