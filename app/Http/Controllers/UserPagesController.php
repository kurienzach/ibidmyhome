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

        if ($user->payment_done) {
            return view('user.dashboard', compact('user')); 
        }
        else {
            return redirect('/payment'); 
        }
    }

    public function bid()
    {
        $user = Auth::user();
        return view('user.bid', compact('user'));
    }

    public function place_bid(Request $request)
    {
        $user = Auth::user();

        // Verify the unit ID belongs to the project user selected
        $project_unit = ProjectUnit::findOrFail($request->get('unit_id'));
        // [TODO] Test if this check is working
        if ($project_unit->project->id != $user->project_id) {
            return redirect('bid');
        }

        // Verify the bid is a valid integer and is greater than min bid amount
        $bid_value = $request->get('bid_value');
        if (!is_numeric($bid_value) || $bid_value < $project_unit->min_bid_value) {
            return redirect('bid');
        }

        // Check if user already has placed a bid
        if ($user->bid == null) {
            $bid = new Bid();
        }
        // This is a modification to existing bid
        else {
            $bid = $user->bid()->first();
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
