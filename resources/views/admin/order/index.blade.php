@extends("layouts.admin.app")
@section('title', 'Orders')
@section('content')
    
<div class="height-100">
    <div class="d-flex justify-content-between mb-5">
        <h2 class="mb-0">Orders</h2>
        {{-- <a href="{{ route('admin.order.create') }}" class="btn btn-primary">Add</a> --}}
    </div>
    
    <table id="myTable">
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>User</th>
                <th>Location</th>
                <th>Contact</th>
                <th>Total</th>
                <th>Payment Method</th>
                <th>Payment Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->location }}</td>
                    <td>{{ $order->contact }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->payment_method }}</td>
                    @if ($order->payment_status == 'pending')
                        <td><a href="/order/toggleStatus/{{ $order->id }}" class="btn btn-warning rounded-pill">Pending</a></td>
                    @else
                        <td><a href="/order/toggleStatus/{{ $order->id }}" class="btn btn-success rounded-pill">Complete</a></td>
                    @endif
                    <td>{{ $order->date }}</td>
                    <td class="d-flex">
                        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST">
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