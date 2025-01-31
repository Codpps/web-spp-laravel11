@extends('admin.layouts')
@section('content')
    <div class="p-5">
        <div class="card">
            <h5 class="card-header">Tambah Pembayaran</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('pembayaran.store') }}" method="POST" id="pembayaran-form">
                    @csrf

                    <!-- Pilih Siswa -->
                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-control" id="siswa_id" name="siswa_id" required>
                            <option selected disabled>Pilih Siswa</option>
                            @foreach ($siswa as $item)
                                <option value="{{ $item->id }}" data-spp-id="{{ $item->spp->id }}"
                                        data-nominal="{{ $item->spp->nominal }}">
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                        <label for="siswa_id">Nama Siswa</label>
                    </div>

                    <!-- Pilih Petugas -->
                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option selected disabled>Pilih Petugas</option>
                            @foreach ($petugas as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <label for="user_id">Petugas</label>
                    </div>

                    <!-- Nominal SPP (Otomatis Terisi) -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" class="form-control" id="nominal_spp" readonly>
                        <label for="nominal_spp">Nominal SPP</label>
                    </div>

                    <!-- Jumlah Bayar -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" required>
                        <label for="jumlah_bayar">Jumlah Bayar</label>
                        <small id="error-message" class="text-danger" style="display: none;">Jumlah bayar tidak boleh lebih dari Nominal SPP!</small>
                    </div>

                    <!-- Hidden SPP ID -->
                    <input type="hidden" id="spp_id" name="spp_id">

                    <button type="submit" class="btn btn-primary w-100">Tambah Pembayaran</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Script untuk mengisi otomatis Nominal SPP, SPP ID, dan Validasi Jumlah Bayar -->
    <script>
        document.getElementById("siswa_id").addEventListener("change", function() {
            const selectedOption = this.options[this.selectedIndex];
            const nominal = selectedOption.getAttribute("data-nominal");
            const sppId = selectedOption.getAttribute("data-spp-id");

            document.getElementById("nominal_spp").value = "Rp " + nominal;
            document.getElementById("spp_id").value = sppId; // Set hidden spp_id
        });

        // Validasi jumlah bayar
        document.getElementById("pembayaran-form").addEventListener("submit", function(event) {
            const jumlahBayar = parseInt(document.getElementById("jumlah_bayar").value);
            const nominalSpp = parseInt(document.getElementById("nominal_spp").value.replace("Rp ", "").replace(",", ""));

            if (jumlahBayar > nominalSpp) {
                event.preventDefault();
                document.getElementById("error-message").style.display = "block";
            }
        });
    </script>
@endsection
