<div class="container">
    <h1>{{ $company->name }}</h1>
    <p><strong>ID:</strong> {{ $company->id }}</p>
    <p><strong>Code:</strong> {{ $company->code }}</p>
    <p><strong>Address:</strong> {{ $company->address }}</p>
    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
    </form>
</div>