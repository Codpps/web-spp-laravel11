@extends('admin.layouts')
@section('content')
 <div class="p-5">
    <div class="card">
        <h5 class="card-header">Form Controls</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
            <form action="{{ route('petugas.store') }}" method="POST">
                @csrf

                <!-- Username -->
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="name"
                        placeholder="Enter Username"
                        aria-label="Username" />
                    <label for="username">Username</label>
                </div>

                <!-- Email -->
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        id="exampleFormControlInput1"
                        placeholder="Enter Email"
                        aria-label="Email" />
                    <label for="exampleFormControlInput1">Email address</label>
                </div>

                <!-- Password -->
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        placeholder="Enter Password"
                        aria-label="Password" />
                    <label for="password">Password</label>
                </div>

                <!-- Password Confirmation -->
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="password"
                        class="form-control"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm Password"
                        aria-label="Password Confirmation" />
                    <label for="password_confirmation">Confirm Password</label>
                </div>

                <!-- Role Selection -->
                <div class="form-floating form-floating-outline mb-6">
                    <select class="form-select" id="role" name="role" aria-label="Select Role">
                        <option value="">Select Role</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                    <label for="role">Role</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Add Petugas</button>
            </form>
        </div>
    </div>
</div>
@endsection
