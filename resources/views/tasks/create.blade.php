@extends('layouts.main')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-4">
                <form method="POST" action="{{route('tasks.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Task name:</label>
                        <div class="control">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
                            @error('name')
                            <div class="invalid-feedback">{{$errors->first('name')}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="priority">Task priority:</label>
                        <div class="control">
                            <input type="number" class="form-control @error('priority') is-invalid @enderror" name="priority" id="priority">
                            @error('priority')
                            <div class="invalid-feedback">{{$errors->first('priority')}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="project_id">Project</label>
                        <select class="custom-select" id="project_id" name="project_id">
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{ucfirst($project->name)}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
