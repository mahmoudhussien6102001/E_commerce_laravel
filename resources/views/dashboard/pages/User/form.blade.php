{{-- Username --}}
<div class="form-group mb-3">
    <label for="username" class="form-label text-white">
        Username <span class="text-danger">*</span>
    </label>
    <input type="text" name="username" id="username" 
           value="{{ old('username', $user->username ?? '') }}" 
           class="form-control @error('username') is-invalid @enderror" 
           placeholder="Enter Username" 
           required>
    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Email --}}

<div class="form-group mb-3">
    <label for="email" class="form-label text-white">
        Email
    </label>
    <input type="email" name="email" id="email" 
           value="{{ old('email', $user->email ?? '') }}" 
           class="form-control @error('email') is-invalid @enderror" 
           placeholder="Enter Email">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- User Type --}}
<div class="form-group mb-3">
    <label for="user_type" class="form-label text-white">
        User Type
    </label>
    <select name="user_type" id="user_type" 
            class="form-select @error('user_type') is-invalid @enderror">
        <option value="" disabled selected>Select User Type</option>
        <option value="admin" {{ old('user_type', $user->user_type) === "admin" ? "selected" : '' }}>Admin</option>
        <option value="customer" {{ old('user_type', $user->user_type) === "customer" ? "selected" : '' }}>Customer</option>
        <option value="moderator" {{ old('user_type', $user->user_type) === "moderator" ? "selected" : '' }}>Moderator</option>
    </select>
    @error('user_type')
        <span class="invalid-feedback" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
    @enderror
</div>
