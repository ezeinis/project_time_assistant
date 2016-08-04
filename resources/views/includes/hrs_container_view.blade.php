@foreach($project->work_instances as $work_instance)
    <div class="row" id="work_instance_row_{{$work_instance->id}}">
        <div class="col-md-4 created_at">
            {{$work_instance->created_at}}
        </div>
        <div class="col-md-1 hrs">
            {{$work_instance->hrs}}
        </div>
        <div class="col-md-6 notes">
            {{myTruncate($work_instance->note)}}
        </div>
        <div class="col-md-1 del_work_instance" id="del_{{$work_instance->id}}">
            <i id="del_{{$work_instance->id}}" class="fa fa-times" aria-hidden="true"></i>
        </div>
    </div>
@endforeach
