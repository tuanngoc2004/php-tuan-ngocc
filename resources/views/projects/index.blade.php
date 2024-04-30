<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<div class="container">
    <h1>All Projects</h1>
    <a href="{{ route('projects.create') }}" class="btn btn-primary mb-2">Create New Project</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Company</th>
                <th>Persons</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->code }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->company->name }}</td>
                    <td>
                        <ul>
                            @foreach($project->persons as $person)
                                <li>{{ $person->full_name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{-- <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-primary">View</a> --}}
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $projects->links() }}
</div>
