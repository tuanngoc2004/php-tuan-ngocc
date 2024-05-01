@extends('includes.main')

@section('content')
<div class="container">
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="role">Role:</label>
            <input type="text" name="role" id="role" value="{{ $role->role }}" class="form-control" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{ $role->description }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>    
@endsection

