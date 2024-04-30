<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<div class="container">
    <h1>All Persons</h1>
    <a href="{{ route('persons.create') }}" class="btn btn-primary mb-2">Create New Person</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Company</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persons as $person)
                <tr>
                    <td>{{ $person->id }}</td>
                    <td>{{ $person->full_name }}</td>
                    <td>{{ $person->gender }}</td>
                    <td>{{ $person->birthdate }}</td>
                    <td>{{ $person->phone_number }}</td>
                    <td>{{ $person->address }}</td>
                    <td>{{ $person->company->name }}</td>

                    <td>
                        <a href="{{ route('persons.edit', $person->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('persons.destroy', $person->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this person?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $persons->links() }}
</div>