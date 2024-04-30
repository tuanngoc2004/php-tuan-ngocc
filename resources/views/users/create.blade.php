<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="roles">Roles</label><br>
        @foreach($roles as $role)
            <input type="checkbox" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}">
            <label for="role_{{ $role->id }}">{{ $role->name }}</label><br>
        @endforeach
    </div>

    <button type="submit" class="btn btn-primary">Create User</button>
</form>
