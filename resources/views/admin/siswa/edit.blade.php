@extends('admin.layouts')

@section('content')
<div class="p-5">
    <div class="card">
        <h5 class="card-header">Edit Siswa</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nama Siswa -->
                <div class="form-floating form-floating-outline mb-6">
                    <input type="text" class="form-control" id="nama" name="nama"
                        value="{{ old('nama', $siswa->nama) }}" placeholder="Enter siswa">
                    <label for="nama">Nama Siswa</label>
                </div>

                <!-- NISN -->
                <div class="form-floating form-floating-outline mb-6">
                    <input type="text" class="form-control" id="nisn" name="nisn"
                        value="{{ old('nisn', $siswa->nisn) }}" placeholder="Enter nisn">
                    <label for="nisn">NISN</label>
                </div>

                <!-- NIS -->
                <div class="form-floating form-floating-outline mb-6">
                    <input type="text" class="form-control" id="nis" name="nis"
                        value="{{ old('nis', $siswa->nis) }}" placeholder="Enter nis">
                    <label for="nis">NIS</label>
                </div>

                <!-- Kelas -->
                <div class="form-floating form-floating-outline mb-6">
                    <select class="form-control" id="kelas_id" name="kelas_id">
                        <option value="" disabled {{ old('kelas_id', $siswa->kelas_id) ? '' : 'selected' }}>Pilih Kelas</option>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}" {{ old('kelas_id', $siswa->kelas_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                    <label for="kelas_id">Kelas</label>
                </div>

                <!-- Alamat -->
                <div class="form-floating form-floating-outline mb-6">
                    <input type="text" class="form-control" id="alamat" name="alamat"
                        value="{{ old('alamat', $siswa->alamat) }}" placeholder="Enter alamat">
                    <label for="alamat">Alamat</label>
                </div>

                <!-- No. Telepon -->
                <div class="form-floating form-floating-outline mb-6">
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                        value="{{ old('no_telp', $siswa->no_telp) }}" placeholder="Enter no_telp">
                    <label for="no_telp">No. Telepon</label>
                </div>

                <!-- SPP -->
                <div class="form-floating form-floating-outline mb-6">
                    <select class="form-control" id="spp_id" name="spp_id">
                        <option value="" disabled {{ old('spp_id', $siswa->spp_id) ? '' : 'selected' }}>Pilih SPP</option>
                        @foreach ($spp as $item)
                            <option value="{{ $item->id }}" {{ old('spp_id', $siswa->spp_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->tahun }} | {{ number_format($item->nominal, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    <label for="spp_id">SPP</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
