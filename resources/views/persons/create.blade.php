@extends('includes.main')

@section('content')
<div class="container">
    <h1>Create New Person</h1>
    <form action="{{ route('persons.store') }}" method="POST">
        @csrf
        <div>
            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" id="full_name" class="form-control">
        </div>
        <div>
            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control">
        </div>
        <div>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" id="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection