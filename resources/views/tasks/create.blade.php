@extends('includes.main')

@section('content')

<div class="container">
    <h1>Create New Task</h1>
    @include('includes.alert')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control">
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="person_id">Person:</label>
            <select name="person_id" id="person_id" class="form-control">
                <option value="">Select Person</option>
                @foreach ($persons as $person)
                    <option value="{{ $person->id }}">{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="date" name="start_time" id="start_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="date" name="end_time" id="end_time" class="form-control">
        </div>
        <div class="form-group">
            <label for="priority">Priority:</label>
            <select name="priority" id="priority" class="form-control">
                <option value="1">High</option>
                <option value="2">Medium</option>
                <option value="3">Low</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1">New</option>
                <option value="2">In Progress</option>
                <option value="3">Completed</option>
                <option value="4">On Hold</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection
