<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Departments</title>
    <style>
        ul {
            list-style-type: none;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Departments</h1>
    <a href="{{ route('departments.create') }}">Create New Department</a>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Parent</th>
                <th>Code</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->code }}</td>
                    <td>{{ $department->parent ? $department->parent->name : 'None' }}</td>
                    <td>{{ $department->company ? $department->company->name : 'None' }}</td>
                    <td>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @if ($department->children->isNotEmpty())
                    <tr>
                        <td colspan="5">
                            <ul>
                                @foreach ($department->children as $child)
                                    @include('departments.treeview', ['department' => $child])
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
 