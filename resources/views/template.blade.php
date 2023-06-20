@extends('layouts.app')

@section('title', "Customize")

@section('content')
<div class="container page">
    <div class="customize container mb-5 pb-5">
        <h6 class="pt-5 text-center mb-4">Customize | {{ $template->name }}</h6>
        <div class="row">
            <div class="col-md-7">
                <img src="{{ asset("assets/images/templates/".$template->image) }}" alt="image" class="template-show">
            </div>
            <div class="col-md-5 product">
                <h2 class="mb-5 mt-2">{{ $template->name }}</h2>
                <div class="product-desc my-5">{{$template->name}}</div>
                <div class="price fw-bold mb-3">Nrs. {{ $template->price }}</div>
                <div class="d-flex align-items-center w-100">
                    <span class="product-buttons">
                        <form action="/customize/{{ $template->id }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label for="custom_img" class="col-form-label">Custom Image:</label>
                                </div>
                                <div class="col-auto">
                                    <input class="form-control" type="file" name="custom_img" id="">
                                </div>
                            </div>
                            <div id="customHelpBlock" class="form-text mb-4">
                                Please upload an image of choice in jpg, jpeg, or png format to customize these shoes.
                            </div>
                            <div class="row g-3 mb-4 align-items-center">
                                <div class="col-auto">
                                    <label for="img_position" class="col-form-label">Image Position:</label>
                                </div>
                                <div class="col-auto">
                                    <select class="form-select" aria-label="Default select" name="img_position">
                                        <option value="top-left" selected>Top</option>
                                        <option value="left">Center</option>
                                        <option value="bottom-left">Bottom</option>
                                    </select>
                                </div>
                            </div>
                            <input type="submit" name="" class="btn btn-primary rounded-pill me-4" id="" value="Customize">
                        </form>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')

@endsection