<div class="container">
    <h1>Edit Department</h1>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $department->name }}">
        </div>
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ $department->code }}">
        </div>
        <div class="form-group">
            <label for="parent_id">Parent Department:</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Select Parent Department</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}" @if($dept->id == $department->parent_id) selected @endif>{{ $dept->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="company_id">Company:</label>
            <select name="company_id" id="company_id" class="form-control">
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" @if($company->id == $department->company_id) selected @endif>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
