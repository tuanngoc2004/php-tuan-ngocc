@extends('includes.main')

@section('content')
    <h1>Edit Country</h1>
    @include('includes.alert')
    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" value="{{ $country->code }}" class="form-control" required>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $country->name }}" class="form-control" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $country->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
