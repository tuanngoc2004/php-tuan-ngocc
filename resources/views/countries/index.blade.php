{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Countries</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <x-atoms.title>Countries</x-atoms.title>
        <a href="{{ route('countries.create') }}" class="btn btn-primary mb-3">Create New Country</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                <tr>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->code }}</td>
                    <td>{{ $country->description }}</td>
                    <td>
                        <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this country?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> --}}



<x-atoms.title>Countries</x-atoms.title>
<x-atoms.button class="btn-primary mb-3">
    Create New Country
</x-atoms.button>
<x-molecules.table>
    <x-atoms.thead>
        <x-atoms.th>Name</x-atoms.th>
        <x-atoms.th>Code</x-atoms.th>
        <x-atoms.th>Description</x-atoms.th>
        <x-atoms.th>Action</x-atoms.th>
    </x-atoms.thead>
    <tbody>
        @foreach($countries as $country)
        <tr>
            <x-atoms.td>{{ $country->name }}</x-atoms.td>
            <x-atoms.td>{{ $country->code }}</x-atoms.td>
            <x-atoms.td>{{ $country->description }}</x-atoms.td>
            <x-atoms.td>
                <form action="{{ route('countries.edit', $country->id) }}" method="GET" style="display: inline-block;">
                    @csrf
                    <x-atoms.button class="btn-primary">Edit</x-atoms.button>
                </form>
                <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <x-atoms.button class="btn-danger" onclick="return confirm('Are you sure you want to delete this country?')">Delete</x-atoms.button>
                </form>
            </x-atoms.td>
        </tr>
        @endforeach
    </tbody>
</x-molecules.table>
