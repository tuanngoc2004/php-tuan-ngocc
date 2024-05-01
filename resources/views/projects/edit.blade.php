@extends('includes.main')

@section('content')

<div class="container">
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $project->code }}">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $project->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $project->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" id="company_id" class="form-control">
                @foreach ($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $project->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="persons">Persons:</label>
            <select name="persons[]" id="persons" class="form-control" multiple>
                @foreach ($persons as $person)
                    <option value="{{ $person->id }}" {{ $project->persons->contains($person) ? 'selected' : '' }}>{{ $person->full_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection