<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create New Country</title>
</head>
<body>
    <h1>Create New Country</h1>
    @include('countries.alert')
    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
        <div>
            <label for="code">Code:</label>
            <input type="text" name="code" id="code">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description">
        </div>
        <button type="submit">Create</button>
    </form>
</body>
</html>
