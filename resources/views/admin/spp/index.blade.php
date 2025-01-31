@extends('admin.layouts')

@section('content')
    <div class="p-5">
        <a href="{{ route('spp.create') }}" type="button" class="btn btn-primary my-3">+ SPP</a>
        <div class="card">
            <h5 class="card-header">List Table SPP</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Tahun</th>
                            <td>Nominal</td>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($spp as $item)
                            <tr>
                                <td>{{ $item->tahun }}</td>
                                <td>Rp {{ number_format($item->nominal, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('spp.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('spp.destroy', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <!-- Confirmation Dialog for Deletion -->
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Hapus</button>
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
