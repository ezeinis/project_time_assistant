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
