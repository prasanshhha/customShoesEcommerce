@extends("layouts.admin.app")
@section('title', 'Users')
@section('content')
    
<div class="height-100">
    <div class="d-flex justify-content-between mb-5">
        <h2 class="mb-0">Users</h2>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Add</a>
    </div>
    
    <table id="myTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Contact</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->isAdmin())
                        <td>Admin</td>
                    @else
                        <td>Customer</td>
                    @endif
                    <td>{{ $user->phone_number }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary rounded-pill me-2">Edit</a>
                        <form action= "{{ route('admin.user.destroy', $user->id) }}" method="POST">
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