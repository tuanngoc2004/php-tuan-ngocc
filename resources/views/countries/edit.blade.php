<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Country</title>
</head>
<body>
    <h1>Edit Country</h1>
    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" value="{{ $country->code }}" required>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $country->name }}" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{ $country->description }}">
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
