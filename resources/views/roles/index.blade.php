@extends('includes.main')

@section('content')
<div class="container">
    <h1>Roles</h1>
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Create New Role</a>
    <table class="table">
        <thead>
            <tr>
                <th>Role</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->role }}</td>
                    <td>{{ $role->description }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
