<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bid;
use App\ProjectUnit;

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
            return redirect('admin');
        }
        else {
            return back()->withInput()->withErrors(['Incorrect Username / Password!!']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('admin/login');
    }

    public function index(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect('admin/login');
        }

        $bids = Bid::all();
        return view('admin.index', compact('bids'));
    }

    public function bid(Request $request, $id)
    {
        if (!$request->session()->has('admin')) {
            return redirect('admin/login');
        }

        $bid = Bid::findOrFail($id);
        return view('admin.bid_details', compact('bid'));
    }
    
    public function projects(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect('admin/login');
        }

        $units = ProjectUnit::all();
        return view('admin.projects', compact('units'));
    }

    public function edit_unit(Request $request, $id)
    {
        if (!$request->session()->has('admin')) {
            return redirect('admin/login');
        }

        $unit = ProjectUnit::find($id);
        return view('admin.edit_unit', compact('unit'));
    }

    public function save_unit(Request $request)
    {
        if (!$request->session()->has('admin')) {
            return redirect('admin/login');
        }

        $unit = ProjectUnit::findOrFail($request->get('unit_id'));

        $unit->highest_bid = $request->get('highest_bid');
        $unit->save();
        return redirect('admin/projects');
    }
}
