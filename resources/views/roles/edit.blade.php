<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Role</title>
</head>
<body>
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="role">Role:</label>
            <input type="text" name="role" id="role" value="{{ $role->role }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{ $role->description }}">
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
