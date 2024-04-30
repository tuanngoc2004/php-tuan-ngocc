<li>
    <strong>{{ $department->name }}</strong>
    <ul>
        @foreach ($department->children as $child)
            @include('departments.treeview', ['department' => $child])
        @endforeach
    </ul>
</li>
