@extends('includes.main')

@section('content')
<div class="container">
    <h1>Create New Role</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div>
            <label for="role">Role:</label>
            <input type="text" name="role" id="role" class="form-control">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
</div>    
@endsection
