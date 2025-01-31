@extends('admin.layouts')
@section('content')
 <div class="p-5">
    <div class="card">
        <h5 class="card-header">Edit Petugas</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
            <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Username -->
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="username"
                        name="name"
                        value="{{ old('name', $petugas->name) }}"
                        placeholder="Enter Username" />
                    <label for="username">Username</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="exampleFormControlInput1"
                        value="{{ old('email', $petugas->email) }}"
                        placeholder="Enter Email" />
                    <label for="exampleFormControlInput1">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password (only if the user wants to change it) -->
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        placeholder="Enter Password" />
                    <label for="password">Password (Leave blank to keep current)</label>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Role Selection -->
                <div class="form-floating form-floating-outline mb-6">
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" aria-label="Default select example">
                        <option value="admin" {{ old('role', $petugas->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="petugas" {{ old('role', $petugas->role) == 'petugas' ? 'selected' : '' }}>Petugas</option>
                    </select>
                    <label for="role">Role</label>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
