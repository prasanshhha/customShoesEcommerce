@extends("layouts.admin.app")
@section('title', 'Dashboard')
@section('content')
    
<div class="height-100">
    <h2>Admin Dashboard</h2>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endsection