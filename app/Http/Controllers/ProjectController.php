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
        $project = Project::where('name',$request->project_name)->first();
        $project->total_hrs+=$request->hrs;
        $project->save();
        $work_instance = new Work_instance;
        $work_instance->hrs=$request->hrs;
        $work_instance->note=$request->note;
        $work_instance->project_id=$project->id;
        $work_instance->save();
        $hrs=$request->hrs;
        $date=$work_instance->created_at;
        return array(view('includes.single_row_hour_instance',compact('work_instance'))->render(),$project->total_hrs);
    }

    public function get_work_instance(Request $request)
    {
        $project = Project::where('name',$request->project_name)->with('work_instances')->first();
        //dd($project->toArray());
        return array($project->name,$project->total_hrs,view('includes.hrs_container_view',compact('project'))->render());
    }

    public function delete_work_instance(Request $request)
    {
        $work_instance = Work_instance::find($request->work_instance_id);
        $project = Project::where('id',$work_instance->project_id)->first();
        $project->total_hrs-=$work_instance->hrs;
        $project->save();
        $work_instance->delete();
        return $project->total_hrs;
    }
}
