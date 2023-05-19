@extends("layouts.admin.app")
@section('title', 'Add user')
@section('content')

<div class="height-100 m-4">
    <div class="d-flex justify-content-between mb-5">
        <h2 class="mb-0">Add User</h2>
        <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Back</a>
    </div>
    <div class="container1">
        <form action="{{ route('admin.user.store') }}" method='POST' name="myform" class="form-group">
        @csrf
        @include('admin.user.form')
            <div class="d-grid col-md-1 button">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection