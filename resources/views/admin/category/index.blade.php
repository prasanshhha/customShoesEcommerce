@extends("layouts.admin.app")
@section('title', 'Categories')
@section('content')
    
<div class="height-100">
    <div class="d-flex justify-content-between mb-5">
        <h2 class="mb-0">Categories</h2>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add</a>
    </div>
    
    <table id="myTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary rounded-pill me-2">Edit</a>
                        <form action= "{{ route('admin.category.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection