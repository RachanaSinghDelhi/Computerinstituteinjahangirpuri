
<div class = "container py-4">
<h1>Login Form</h1>

<div>
    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="login">
        <div class="input-group mb-3">
            <input type="email" wire:model="email" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fa fa-envelope"></span>
                </div>
            </div>
        </div>
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror

        <div class="input-group mb-3">
            <input type="password" wire:model="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fa fa-lock"></span>
                </div>
            </div>
        </div>
        @error('password') <span class="text-danger">{{ $message }}</span> @enderror

        <div class="input-group mb-3">
            <select wire:model="role" class="form-control" required>
                <option value="">Select Role</option>
                <option value="admin" selected>Admin</option>
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
        </div>
        @error('role') <span class="text-danger">{{ $message }}</span> @enderror

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </div>
    </form>
<!--
    <p class="mt-3 mb-1 text-center">
        <a href="">Forgot Password?</a>
    </p>-->
</div>
</div>