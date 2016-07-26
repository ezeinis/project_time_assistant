<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        $first_project=Project::with('work_instances')->first();
        $projects_names=[];
        $projects=Project::all();
        foreach ($projects as $project) {
            array_push($projects_names, $project->name);
        }
        return view('pages.index',compact('first_project','projects_names'));
    }
}
