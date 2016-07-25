<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Work_instance;
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

    public function add_hours(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $project->total_hrs+=$request->hours_worked;
        $project->save();
        $work_instance = new Work_instance;
        $work_instance->hrs=$request->hours_worked;
        $work_instance->project_id=$request->project_id;
        $work_instance->save();
        return back();
    }
}
