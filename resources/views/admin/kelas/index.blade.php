@extends('admin.layouts')
@section('content')
    <div class="p-5">
        <a href="{{ route('kelas.create') }}" type="button" class="btn btn-primary my-3">+ kelas</a>
        <div class="card">
            <h5 class="card-header">List Table Kelas</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($kelas as $item)
                        <tr>
                            <td>{{ $item->nama_kelas }}</td>
                            <td class="d-flex justify-content-start gap-2">
                                <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('kelas.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
