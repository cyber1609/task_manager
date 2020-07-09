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
                        <div class="ui-state-default" data-id="{{$task->id}}">
                            <span class="ui-icon ui-icon-arrowthick-2-n-s handle"></span>
                            <a href="{{route('tasks.show', $task->id)}}">{{$task->name}}</a>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <a href="{{route('tasks.create')}}">Create task</a>
    <span id="token" hidden>{{csrf_token()}}</span>
@endsection
