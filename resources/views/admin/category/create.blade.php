@extends("layouts.admin.app")
@section('title', 'Add Category')
@section('content')

<div class="height-100">
    <div class="d-flex justify-content-between mb-5">
        <h2 class="mb-0">Add Category</h2>
        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="container1">
        <form action="{{ route('admin.category.store') }}" method='POST' name="myform" class="form-group">
        @csrf
        @include('admin.category.form')
            <div class="d-grid col-md-1 button">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection