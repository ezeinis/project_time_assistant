<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;
use App\Http\Requests;

class ProjectController extends Controller
{
    public function create(Request $request)
    {
        $project = new Project();
        $project->name=$request->project_name;
        $project->total_hrs=0;
        $project->user_id=Auth::user()->id;
        $project->save();
        return back();
    }
}
