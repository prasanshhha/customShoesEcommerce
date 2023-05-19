@extends("layouts.admin.app")
@section('title', 'Update Product')
@section('content')

<div class="height-100 m-4">
    <div class="d-flex justify-content-between mb-5">
        <h2 class="mb-0">Update Product</h2>
        <a href="{{ route('admin.product.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="container1">
        <form action="{{ route('admin.product.update', $product->id) }}" method='POST' name="myform" class="form-group"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.product.form')
            <div class="d-grid col-md-1 button">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
    @endsection