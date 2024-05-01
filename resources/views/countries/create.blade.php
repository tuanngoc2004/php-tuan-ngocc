@extends('includes.main')

@section('content')
    <h1>Create New Country</h1>
    @include('includes.alert')
    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
        <div>
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" class="form-control">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
