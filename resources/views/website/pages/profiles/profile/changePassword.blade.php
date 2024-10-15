@extends('website.layouts.master')

@section('title', 'Change Password')

@section('main-content')
<div class="container mt-5">
    <h1 class="text-center mb-4" style="font-size: 2.5rem; font-weight: bold; color: #7B1FA2;">Change Password</h1>

    @if(session('success'))
        <div class="alert alert-success text-center" style="background-color: #E1BEE7; font-weight: bold; font-size: 1.1rem; border-radius: 8px;">
            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mb-4 rounded-lg shadow-lg" style="border: none; border-radius: 20px; background-color: #f8f9fa;">
                <div class="card-body">
                    <form action="{{ route('profile.updatePassword', ['id' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- This is important to indicate the PUT method -->

                        <div class="form-group">
                            <label for="current_password" style="color: #7B1FA2; font-weight: bold;">Current Password</label>
                            <div class="input-group">
                                <input type="password" id="current_password" name="current_password" class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword('current_password')">
                                        <i id="eye_current" class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="new_password" style="color: #7B1FA2; font-weight: bold;">New Password</label>
                            <div class="input-group">
                                <input type="password" id="new_password" name="new_password" class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword('new_password')">
                                        <i id="eye_new" class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password" style="color: #7B1FA2; font-weight: bold;">Confirm New Password</label>
                            <div class="input-group">
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="togglePassword('confirm_password')">
                                        <i id="eye_confirm" class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-success rounded-pill shadow-sm" style="padding: 8px 15px; font-size: 1rem; border-radius: 15px;">
                                <i class="fas fa-key"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(id) {
        const inputField = document.getElementById(id);
        const eyeIcon = document.getElementById('eye_' + id.split('_')[1]);

        if (inputField.type === "password") {
            inputField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            inputField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }
</script>
@endsection
