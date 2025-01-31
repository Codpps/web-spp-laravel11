@extends('admin.layouts')

@section('content')
<div class="p-5">
    <div class="card">
        <h5 class="card-header">History Pembayaran</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Pembayaran</th>
                        <th>Nama Siswa</th>
                        <th>Siswa NISN</th>
                        <th>Siswa Kelas</th>
                        <th>Nominal Pembayaran</th>
                        <th>Tahun SPP</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembayaran as $item)
                    <tr>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td> <!-- Showing payment date -->
                        <td>{{ $item->siswa->nama ?? 'Data Tidak Tersedia' }}</td> <!-- Student name -->
                        <td>{{ $item->siswa->nisn ?? 'Data Tidak Tersedia' }}</td> <!-- Student NISN -->
                        <td>{{ $item->siswa->kelas->nama_kelas ?? 'Data Tidak Tersedia' }}</td> <!-- Assuming you have class data -->
                        <td>{{ number_format($item->jumlah_bayar, 0, ',', '.') }}</td> <!-- Payment amount -->
                        <td>{{ $item->spp->tahun ?? 'Data Tidak Tersedia' }}</td> <!-- SPP year -->
                        <td>{{ $item->status }}</td> <!-- Payment status -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
