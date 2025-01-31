@extends('admin.layouts')
@section('content')

<div class="p-5">
    <div class="card">
        <h5 class="card-header">Tambah Pembayaran</h5>
        <div class="card-body">
            <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST" id="pembayaran-form">
                @csrf
                @method('PUT')

                <!-- Nominal SPP -->
                <div class="mb-3">
                    <label for="nominal_spp" class="form-label">Nominal SPP</label>
                    <input type="text" class="form-control" id="nominal_spp" value="Rp {{ number_format($pembayaran->spp->nominal, 0, ',', '.') }}" readonly>
                </div>

                <!-- Total Dibayar -->
                <div class="mb-3">
                    <label for="total_dibayar" class="form-label">Total Dibayar</label>
                    <input type="text" class="form-control" id="total_dibayar" value="Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}" readonly>
                </div>

                <!-- Tambah Bayar -->
                <div class="mb-3">
                    <label for="jumlah_bayar" class="form-label">Tambah Pembayaran</label>
                    <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required min="1">
                    <small id="error-message" class="text-danger" style="display: none;">Jumlah bayar tidak boleh melebihi sisa pembayaran!</small>
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk Validasi Jumlah Bayar -->
<script>
    document.getElementById("pembayaran-form").addEventListener("submit", function(event) {
        var nominalSpp = parseInt(document.getElementById("nominal_spp").value.replace("Rp ", "").replace(",", ""));
        var totalDibayar = parseInt(document.getElementById("total_dibayar").value.replace("Rp ", "").replace(",", ""));
        var jumlahBayar = parseInt(document.getElementById("jumlah_bayar").value);

        // Hitung sisa pembayaran
        var sisaPembayaran = nominalSpp - totalDibayar;

        // Validasi jika jumlah bayar melebihi sisa pembayaran
        if (jumlahBayar > sisaPembayaran) {
            event.preventDefault();
            document.getElementById("error-message").style.display = "block";
        }
    });
</script>

@endsection
