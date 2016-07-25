@extends('layouts.app')

@section('content')
<div id="new_project_hidden_bar">
    <div class="container">
        <form class="form-horizontal" action="/project/create" method="POST">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="project_name" class="col-xs-2 form-control-label">Project Name</label>
                <div class="col-xs-10">
                    <input type="text" class="form-control" id="project_name" name="project_name">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="index_main_container">
    <div class="container">
        <div class="row">
        @if(!$projects->isEmpty())
            <div id="sidebar" class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Active Projects</h4>
                    </div>
                </div>
                <?php $i=0; ?>
                @foreach($projects as $project)
                    @if($i==0)
                        <div id="sidebar_project_{{$project->id}}" class="row project_list_item_sidebar active">
                    @else
                        <div id="sidebar_project_{{$project->id}}" class="row project_list_item_sidebar">
                    @endif
                        <div class="col-md-12">
                            <h5>{{$project->name}}</h5>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
            </div>
            <div class="col-md-1">
            </div>
            <!-- modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Work Instance</h4>
                          </div>
                          <div class="modal-body">
                            <form action="/project/add_hours" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="project_id" value="{{$projects[0]->id}}">
                            <div class="form-group row">
                                <label for="hours_worked" class="col-xs-3 form-control-label">Hours Worked:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="hours_worked" name="hours_worked">
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
            <!-- modal end -->

            <div id="index_main_section" class="col-md-8">
                <div class="row">
                    <div class="col-md-12 main_section_header">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>{{$projects[0]->name}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Hours worked: {{$projects[0]->total_hrs}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Project description: </h5>
                            </div>
                        </div>
                    </div>
                    <button id="new_hour_project_{{$project->id}}" class="btn new_hour" data-toggle="modal" data-target="#myModal">+</button>
                </div>
                <div id="project_work_instances">
                <div class="row">
                    <div class="col-md-6 created_at_header">
                        Date
                    </div>
                    <div class="col-md-6 hrs_header">
                        Hours
                    </div>
                </div>
                <div id='project_{{$projects[0]->id}}_hours' class='hrs_container'>
                @foreach($projects[0]->work_instances as $work_instance)
                <div class="row">
                    <div class="col-md-6 created_at">
                        {{$work_instance->created_at}}
                    </div>
                    <div class="col-md-6 hrs">
                        {{$work_instance->hrs}}
                    </div>
                </div>
                @endforeach
                </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript">var projects = <?php echo $projects_json; ?>;</script>
    <script src="js/index.js"></script>
@endsection
