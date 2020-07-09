@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">
                {{$task->name}}
            </div>
        </div>
    </div>
    <a href="{{route('tasks.edit', $task->id)}}">
        <button type="submit" class="btn btn-primary">Edit task</button>
    </a>
    <form method="POST" action="{{route('tasks.destroy', $task->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete task</button>
    </form>

@endsection
