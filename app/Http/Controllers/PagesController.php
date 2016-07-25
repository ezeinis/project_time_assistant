<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        $projects=Project::with('work_instances')->get();
        //dd($projects);
        $projects_json=json_encode($projects);
        return view('pages.index',compact('projects','projects_json'));
    }
}
