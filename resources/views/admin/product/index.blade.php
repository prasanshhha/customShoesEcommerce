@extends("layouts.admin.app")
@section('title', 'Products')
@section('content')
    
<div class="height-100">
    <div class="d-flex justify-content-between mb-5">
        <h2 class="mb-0">Products</h2>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Add</a>
    </div>
    
    <table id="myTable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Images</th>
                <th>Category</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $product->id }}">
                            View
                        </button>
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->price }}</td>
                    <td class="desc-truncate">{{ $product->description }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-primary rounded-pill me-2">Edit</a>
                        <form action= "{{ route('admin.product.destroy', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
                        </form>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Images</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                @if (isset($product->thumbnail))
                                    <div class="col"><img src="{{ asset($product->thumbnail) }}" alt="sth" width="200" height="auto"></div>
                                @else
                                    <div class="col"></div>
                                @endif
                                @if (isset($product->image_one))
                                    <div class="col"><img src="{{ asset($product->image_one) }}" alt="sth" width="200" height="auto"></div>
                                @else
                                    <div class="col"></div>
                                @endif
                            </div>
                            <div class="row">
                                @if (isset($product->image_two))
                                    <div class="col"><img src="{{ asset($product->image_two) }}" alt="sth" width="200" height="auto"></div>
                                @else
                                    <div class="col"></div>
                                @endif
                                @if (isset($product->image_three))
                                    <div class="col"><img src="{{ asset($product->image_three) }}" alt="sth" width="200" height="auto"></div>
                                @else
                                    <div class="col"></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                @empty
                
                @endforelse
            </div>
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