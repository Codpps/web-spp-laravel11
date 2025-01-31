@extends('admin.layouts')
@section('content')
 <div class="p-5">
    <div class="card">
        <h5 class="card-header">Tambah Kelas</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="form-floating form-floating-outline mb-6">
                    <input
                        type="text"
                        class="form-control"
                        id="nama_kelas"
                        name="nama_kelas"
                        placeholder="Masukkan Nama Kelas" />
                    <label for="nama_kelas">Nama Kelas</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Tambah Kelas</button>
            </form>
        </div>
    </div>
 </div>
@endsection
