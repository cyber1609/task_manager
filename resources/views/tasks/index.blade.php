@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">
                @if (!count($tasks))
                    No tasks yet!
                @endif
                <ul id="sortable">
                    @foreach ($tasks as $task)
                        <div class="ui-state-default item" data-id="{{$task->id}}" id="{{$task->project_id}}">
                            <span hidden>"{{$task->project_id}}"</span>
                            <span class="ui-icon ui-icon-arrowthick-2-n-s handle"></span>
                            <a href="{{route('tasks.show', $task->id)}}">{{$task->name}}</a>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="project-selector">
        <select class="form-control" id="select-project">
            @foreach ($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach
        </select>
    </div>

    <a href="{{route('tasks.create')}}">Create task</a>
    <span id="token" hidden>{{csrf_token()}}</span>
@endsection
