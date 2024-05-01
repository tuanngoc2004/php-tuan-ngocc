@extends('includes.main')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ $user->is_active ? 'checked' : '' }}>
            <label for="is_active" class="form-check-label">Active</label>
        </div>
        <div class="form-group">
            <label for="role_id">Role:</label>
            @foreach ($roles as $role)
            <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'checked' : '' }}> {{ $role->role }}
        @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection