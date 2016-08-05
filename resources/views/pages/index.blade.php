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
        @if(!empty($projects_names))

            <!-- sidebar -->
                <div id="sidebar" class="col-md-3">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Active Projects</h4>
                    </div>
                </div>
                <?php $i=0; ?>
                @foreach($projects_names as $project_name)
                    @if($i==0)
                        <div id="sidebar_project_{{$project_name}}" class="row project_list_item_sidebar active">
                    @else
                        <div id="sidebar_project_{{$project_name}}" class="row project_list_item_sidebar">
                    @endif
                        <div class="col-md-12">
                            <h5>{{$project_name}}</h5>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
                </div>
            <!-- sidebar end -->
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
                            <div class="form-group row">
                                <label for="hours_worked" class="col-xs-3 form-control-label">Hours Worked:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="hours_worked" name="hours_worked">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="note" class="col-xs-3 form-control-label">Note:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="note" name="note">
                                </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary new_hour_submit_button">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
            <!-- modal end -->
            <!-- main section -->
                <div id="index_main_section" class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 main_section_header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 id="project_name_header">{{$first_project->name}}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 id="project_hrs_header">Hours worked: {{$first_project->total_hrs}}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Project description: </h5>
                                </div>
                            </div>
                        </div>
                        <button class="btn new_hour" data-toggle="modal" data-target="#myModal"><img src="/images/plus-24.png"></button>
                    </div>
                    <div id="project_work_instances">
                        <div class="row">
                            <div class="col-md-4 created_at_header">
                                Date
                            </div>
                            <div class="col-md-1 hrs_header">
                                Hours
                            </div>
                            <div class="col-md-6 hrs_header">
                                Notes
                            </div>
                            <div class="col-md-1">

                            </div>
                        </div>
                        <div class='hrs_container'>
                            @foreach($first_project->work_instances as $work_instance)
                            <div class="row" id="work_instance_row_{{$work_instance->id}}">
                                <div class="col-md-4 created_at">
                                    {{$work_instance->created_at}}
                                </div>
                                <div class="col-md-1 hrs">
                                    <div id="hrs_regular_{{$work_instance->id}}" class="hrs_regular">{{$work_instance->hrs}}</div>
                                    <input id="hrs_input_{{$work_instance->id}}" class="form-control" type="text" name="" value="{{$work_instance->hrs}}">
                                </div>
                                <div class="col-md-6 notes">
                                    <div id="trunc_note_{{$work_instance->id}}" class="trunc_note">{{myTruncate($work_instance->note)}}</div>
                                    <div id="full_size_note_{{$work_instance->id}}" class="full_size_note">{{$work_instance->note}}</div>
                                    <div id="edit_note_{{$work_instance->id}}" class="edit_note"><textarea class="form-control">{{$work_instance->note}}</textarea></div>
                                </div>
                                <div class="col-md-1 del_work_instance">
                                    <i id="edit_{{$work_instance->id}}" class="fa fa-pencil" aria-hidden="true"></i>
                                    <i id="save_{{$work_instance->id}}" class="fa fa-save" aria-hidden="true"></i>
                                    <i id="del_{{$work_instance->id}}" class="fa fa-times" aria-hidden="true"></i>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            <!-- end main section -->
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="js/index.js"></script>
@endsection
