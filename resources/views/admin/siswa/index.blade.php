@extends('admin.layouts')
@section('content')
    <div class="p-5">
        <a href="{{ route('siswa.create') }}" type="button" class="btn btn-primary my-3">+ Siswa</a>
        <div class="card">
            <h5 class="card-header">List Table Siswa</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Name</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>SPP ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($siswa as $item)
                            <tr>
                                <td>{{ $item->nisn }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kelas->nama_kelas }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_telp }}</td>
                                <td>{{ $item->spp->tahun }} | {{ $item->spp->nominal }} </td>
                                <td class="d-flex justify-content-start">
                                    <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>
                                    <form action="{{ route('siswa.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
