<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Project;

class UserPagesController extends Controller
{
    // Returns the main index page
    public function index()
    {
        $projects = Project::all()->groupBy('city')->toJSON();
        return view('user.index', compact('projects'));
    }
}
