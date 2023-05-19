<div class="row gx-5 mb-3 align-items-center">
    <div class="col-md-6 col-name" >
        <div class="row align-items-center">
            <label for="name" class=" col-md-4 form-label">Name<span class="text-danger"><b>*</b></span></label>
            <input type="text" class=" col-md-4 form-control" id="name" name="name" required value="{{!empty(old('name')) ? old('name') : $user->name ?? ''}}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="row align-items-center">
            <label for="email" class=" col-md-4 form-label">Email<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="text" id="email" name="email" required value="{{!empty(old('email')) ? old('email') : $user->email ?? ''}}" >
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="row align-items-center">
            <label for="phone_number" class=" col-md-4 form-label">Phone number<span class="text-danger"><b>*</b></span></label>
            <input class=" col-md-4 form-control"  type="text" id="phone_number" name="phone_number" required value="{{!empty(old('phone_number')) ? old('phone_number') : $user->phone_number ?? ''}}" >
            @error('phone_number')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="row align-items-center">
            <label for="is_admin" class=" col-md-4 form-label">Role<span class="text-danger"><b>*</b></span></label>
            <select name="is_admin" class="form-select" aria-label="Default select example">
                <option selected disabled>-- Choose role  --</option>
                <option value="0" {{ !empty(old('is_admin')) && old('is_admin') == 0 ? 'selected' : '' }}
                    {{ isset($user) && $user->is_admin == 0 && empty(old('is_admin')) ? 'selected' : '' }}>Customer</option>
                <option value="1" {{ !empty(old('is_admin')) && old('is_admin') == 1 ? 'selected' : '' }}
                {{ isset($user) && $user->is_admin == 1 && empty(old('is_admin')) ? 'selected' : '' }}>Admin</option>
            </select>
            @error('is_admin')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
