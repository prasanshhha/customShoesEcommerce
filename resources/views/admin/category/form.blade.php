<div class="mb-3">
    <div class="w-50" >
        <div class="row align-items-center mb-4">
            <label for="name" class=" col-md-4 form-label">Name<span class="text-danger"><b>*</b></span></label>
            <input type="text" class=" col-md-4 form-control" id="name" name="name" required value="{{!empty(old('name')) ? old('name') : $category->name ?? ''}}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="w-50">
        <div class="row align-items-center mb-4">
            <label for="description" class=" col-md-4 form-label">Description<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="text" id="description" name="description" required value="{{!empty(old('description')) ? old('description') : $category->description ?? ''}}" >
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
