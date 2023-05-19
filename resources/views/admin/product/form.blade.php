<div class="row gx-5 mb-3 align-items-center">
    <div class="col-md-6 mb-3 col-name" >
        <div class="row align-items-center">
            <label for="name" class=" col-md-4 form-label">Name<span class="text-danger"><b>*</b></span></label>
            <input type="text" class=" col-md-4 form-control" id="name" name="name" required value="{{!empty(old('name')) ? old('name') : $product->name ?? ''}}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="category_id" class=" col-md-4 form-label">Category<span class="text-danger"><b>*</b></span></label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected disabled>-- Choose category  --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ !empty(old('category_id')) && old('category_id') == $category->id ? 'selected' : '' }}
                    {{ isset($product) && $product->category_id == $category->id && empty(old('category_id')) ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="stock" class=" col-md-4 form-label">Stock<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="number" step="any" id="stock" name="stock" required value="{{!empty(old('stock')) ? old('stock') : $product->stock ?? ''}}" >
            @error('stock')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="price" class=" col-md-4 form-label">Price<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="number" step="any" id="price" name="price" required value="{{!empty(old('price')) ? old('price') : $product->price ?? ''}}" >
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="thumbnail" class=" col-md-4 form-label">Thumbnail<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="file" id="thumbnail" name="thumbnail">
            @error('thumbnail')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="image_one" class=" col-md-4 form-label">Preview picture<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="file" id="image_one" name="image_one">
            @error('image_one')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="image_two" class=" col-md-4 form-label">Preview picture<span class="text-danger"></span></label>
            <input class=" col-md-4 form-control"  type="file" id="image_two" name="image_two">
            @error('image_two')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="image_three" class=" col-md-4 form-label">Preview picture<span class="text-danger"></span></label>
            <input class=" col-md-4 form-control"  type="file" id="image_three" name="image_three">
            @error('image_three')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="row align-items-center">
            <label for="description" class=" col-md-4 form-label">Description<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="text" step="any" id="description" name="description" required value="{{!empty(old('description')) ? old('description') : $product->description ?? ''}}" >
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
