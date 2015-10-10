<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;
use App\ProjectUnit;
use App\Bid;

use Auth;

class UserPagesController extends Controller
{
    // Returns the main index page
    public function index()
    {
        if (!Auth::check()) {
            $projects = Project::all()->groupBy('city')->toJSON();
            return view('user.index', compact('projects'));
        }

        $user = Auth::user();
        $projects = Project::all();

        if ($user->payment_done) {
            return view('user.bid', compact('user', 'projects')); 
        }
        else {
            return redirect('/payment'); 
        }
    }

    public function bid()
    {
        if (!Auth::check() || !Auth::user()->payment_done) {
            return redirect('/');
        }

        $projects = Project::all();

        $user = Auth::user();
        return view('user.bid', compact('user', 'projects'));
    }

    public function change_project(Request $request)
    {
        if (Project::findOrFail($request->get('project_id'))
            && Auth::user()->project_id != $request->get('project_id')) {

            $user = Auth::user();

            // Delete current bid of the user if user has placed bid
            $bid = $user->bid;

            if ($bid) {
                $user->bid_id = null;
                $user->save();
                $bid->delete();
            }

            $user->project_id = $request->get('project_id');
            $user->save();
        }

        return redirect('/bid');
    }

    public function place_bid(Request $request)
    {
        if (!Auth::check() || !Auth::user()->payment_done) {
            return redirect('/');
        }

        $user = Auth::user();

        // Verify the unit ID belongs to the project user selected
        $project_unit = ProjectUnit::findOrFail($request->get('unit_id'));
        // [TODO] Test if this check is working
        if ($project_unit->project->id != $user->project_id) {
            return redirect('/bid');
        }

        // Verify the bid is a valid integer and is greater than min bid amount
        $bid_value = $request->get('bid_value');
        if (!is_numeric($bid_value) || $bid_value < $project_unit->min_bid_value) {
            return redirect('/bid');
        }

        // Check if user already has placed a bid
        if ($user->bid == null) {
            $bid = new Bid();
            $request->session()->flash('alert', 'We will contact you shortly for a post-dated cheque of INR 3 Lakh. This is mandatory for you to be eligible for the final unit allotment. The cheque will not be banked unless you are alloted the unit of your choice');
            $request->session()->flash('alert-title', 'Thank you for placing your bid');
        }
        // This is a modification to existing bid
        else {
            $bid = $user->bid()->first();
            $request->session()->flash('alert', 'Your bid has been successfully modified');
        }

        $bid->unit_id = $request->get('unit_id');
        $bid->bid_value = $request->get('bid_value');
        $bid->total_price = (int)$bid_value * $project_unit->area + $project_unit->other_charges + $project_unit->govt_charges;

        $bid->save();

        $user->bid()->associate($bid);
        $user->save();

        return redirect('/');
    }
}
