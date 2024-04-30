<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Roles</title>
</head>
<body>
    <h1>Roles</h1>
    <a href="{{ route('roles.create') }}">Create New Role</a>
    <ul>
        @foreach($roles as $role)
            <li>{{ $role->role }} - {{ $role->description }}</li>
            <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </ul>
</body>
</html>
