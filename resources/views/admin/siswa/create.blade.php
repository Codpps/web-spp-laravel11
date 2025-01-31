@extends('admin.layouts')
@section('content')
    <div class="p-5">
        <div class="card">
            <h5 class="card-header">Tambah Siswa</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <!-- Nama Siswa -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input
                            type="text"
                            class="form-control"
                            id="nama"
                            name="nama"
                            placeholder="Enter Nama Siswa" />
                        <label for="nama">Nama Siswa</label>
                    </div>

                    <!-- NISN -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input
                            type="text"
                            class="form-control"
                            id="nisn"
                            name="nisn"
                            placeholder="Enter NISN" />
                        <label for="nisn">NISN</label>
                    </div>

                    <!-- NIS -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input
                            type="text"
                            class="form-control"
                            id="nis"
                            name="nis"
                            placeholder="Enter NIS" />
                        <label for="nis">NIS</label>
                    </div>

                    <!-- Kelas -->
                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-select" id="kelas_id" name="kelas_id">
                            <option selected disabled>Pilih Kelas</option>
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                            @endforeach
                        </select>
                        <label for="kelas_id">Kelas</label>
                    </div>

                    <!-- Alamat -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input
                            type="text"
                            class="form-control"
                            id="alamat"
                            name="alamat"
                            placeholder="Enter Alamat" />
                        <label for="alamat">Alamat</label>
                    </div>

                    <!-- No. Telepon -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input
                            type="text"
                            class="form-control"
                            id="no_telp"
                            name="no_telp"
                            placeholder="Enter No Telepon" />
                        <label for="no_telp">No. Telepon</label>
                    </div>

                    <!-- SPP -->
                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-select" id="spp_id" name="spp_id">
                            <option selected disabled>Pilih SPP</option>
                            @foreach ($spp as $item)
                                <option value="{{ $item->id }}">{{ $item->tahun }} | {{ $item->nominal }}</option>
                            @endforeach
                        </select>
                        <label for="spp_id">SPP</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection
