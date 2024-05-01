@extends('includes.main')

@section('content')
<div class="container">
    <h1>Task List</h1>
    <div>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3" style="margin-right: 10px; margin-top : 20px">Create Tasks</a>
        <a href="{{ route('task') }}" class="btn btn-primary" style="margin-left: 10px; margin-buttom: 40px;">Export to Excel</a>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('tasks.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="company_id">Company:</label>
                    <select name="company_id" id="company_id" class="form-control">
                        <option value="">Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="project_id">Project:</label>
                    <select name="project_id" id="project_id" class="form-control">
                        <option value="">Select Project</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" {{ request('project_id') == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="person_id">Person:</label>
                    <select name="person_id" id="person_id" class="form-control">
                        <option value="">Select Person</option>
                        @foreach ($persons as $person)
                            <option value="{{ $person->id }}" {{ request('person_id') == $person->id ? 'selected' : '' }}>{{ $person->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>New</option>
                        <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>In Progress</option>
                        <option value="3" {{ request('status') == '3' ? 'selected' : '' }}>Completed</option>
                        <option value="4" {{ request('status') == '4' ? 'selected' : '' }}>On Hold</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="priority">Priority:</label>
                    <select name="priority" id="priority" class="form-control">
                        <option value="">Select Priority</option>
                        <option value="1" {{ request('priority') == '1' ? 'selected' : '' }}>High</option>
                        <option value="2" {{ request('priority') == '2' ? 'selected' : '' }}>Medium</option>
                        <option value="3" {{ request('priority') == '3' ? 'selected' : '' }}>Low</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>
    </div>
    @csrf
    <a href="{{ route('task') }}" class="btn btn-primary">Export to Excel</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project</th>
                <th>Person</th>
                <th>Name</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->person->full_name }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->start_time }}</td>
                    <td>{{ $task->end_time }}</td>
                    <td>
                        @if($task->priority == 1)
                            High
                        @elseif($task->priority == 2)
                            Medium
                        @else
                            Low
                        @endif
                    </td>
                    <td>
                        @if($task->status == 1)
                            New
                        @elseif($task->status == 2)
                            In Progress
                        @elseif($task->status == 3)
                            Completed
                        @else
                            On Hold
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tasks->links() }}
</div>
@endsection