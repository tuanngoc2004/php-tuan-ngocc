@extends('includes.main')

@section('content')

<div class="container">
    <h1>Create New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" id="company_id" class="form-control">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="persons">Persons:</label>
            <select name="persons[]" id="persons" class="form-control" multiple>
                @foreach ($persons as $person)
                    <option value="{{ $person->id }}">{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

@endsection