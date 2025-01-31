@extends('admin.layouts')
@section('content')

<div class="p-5">
    <a href="{{ route('petugas.create') }}" type="button" class="btn btn-primary my-3">+ Petugas</a>
    <div class="card">
        <h5 class="card-header">List Table Petugas</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($petugas as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td><span class="badge rounded-pill bg-label-primary me-1">{{ $item->role }}</span></td>
                        <td>
                            <a href="{{ route('petugas.edit', $item->id) }}" class="btn btn-warning" aria-label="Edit Petugas">Edit</a>
                            <form action="{{ route('petugas.destroy', $item->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2" onclick="return confirm('Are you sure you want to delete this Petugas?')" aria-label="Delete Petugas">Hapus</button>
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
