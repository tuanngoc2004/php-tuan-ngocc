<div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_id">Project:</label>
            <select name="project_id" id="project_id" class="form-control">
                <option value="">Select Project</option>
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="person_id">Person:</label>
            <select name="person_id" id="person_id" class="form-control">
                <option value="">Select Person</option>
                @foreach ($persons as $person)
                    <option value="{{ $person->id }}" {{ $task->person_id == $person->id ? 'selected' : '' }}>{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="date" name="start_time" id="start_time" class="form-control" value="{{ $task->start_time }}">
        </div>
        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="date" name="end_time" id="end_time" class="form-control" value="{{ $task->end_time }}">
        </div>
        <div class="form-group">
            <label for="priority">Priority:</label>
            <select name="priority" id="priority" class="form-control">
                <option value="1" {{ $task->priority == 1 ? 'selected' : '' }}>High</option>
                <option value="2" {{ $task->priority == 2 ? 'selected' : '' }}>Medium</option>
                <option value="3" {{ $task->priority == 3 ? 'selected' : '' }}>Low</option>
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ $task->status == 1 ? 'selected' : '' }}>New</option>
                <option value="2" {{ $task->status == 2 ? 'selected' : '' }}>In Progress</option>
                <option value="3" {{ $task->status == 3 ? 'selected' : '' }}>Completed</option>
                <option value="4" {{ $task->status == 4 ? 'selected' : '' }}>On Hold</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
