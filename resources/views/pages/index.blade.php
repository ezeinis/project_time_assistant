@extends('layouts.app')

@section('header')
<link rel="stylesheet" type="text/css" href="css/index.css">
@endsection

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
        fsdfas
    </div>
</div>

@endsection
