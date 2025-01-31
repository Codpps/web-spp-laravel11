@extends('admin.layouts')
@section('content')

<div class="p-5">
    <div class="card">
        <h5 class="card-header">Daftar Pembayaran</h5>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th>Nominal SPP</th>
                        <th>Total Dibayar</th>
                        <th>Kekurangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $index => $item)
                        @php
                            $nominal_spp = $item->spp->nominal;
                            $total_dibayar = $item->jumlah_bayar;
                            $kurang = $nominal_spp - $total_dibayar;
                            $status = $kurang <= 0 ? 'Lunas' : 'Belum Lunas';
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->siswa->nama }}</td>
                            <td>Rp {{ number_format($nominal_spp, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($total_dibayar, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($kurang > 0 ? $kurang : 0, 0, ',', '.') }}</td>
                            <td>
                                @if ($kurang <= 0)
                                    <span class="badge bg-success">Lunas</span>
                                @else
                                    <a href="{{ route('pembayaran.edit', $item->id) }}" class="btn btn-primary btn-sm">Tambah Bayar</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('pembayaran.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pembayaran ini?')">Hapus</button>
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
