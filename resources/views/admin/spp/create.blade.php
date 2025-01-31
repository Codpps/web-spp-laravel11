@extends('admin.layouts')

@section('content')
    <div class="p-5">
        <div class="card">
            <h5 class="card-header">Tambah SPP</h5>
            <div class="card-body demo-vertical-spacing demo-only-element">
                <form action="{{ route('spp.store') }}" method="POST">
                    @csrf

                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-control" id="tahun" name="tahun" value="{{ old('tahun') }}">
                            <option selected disabled>Pilih Tahun</option>
                            @php
                                $currentYear = date('Y');
                            @endphp
                            @for ($i = $currentYear - 3; $i <= $currentYear + 5; $i++)
                                <option value="{{ $i }}" {{ old('tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <label for="tahun">Tahun</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input
                            type="number"
                            name="nominal"
                            class="form-control"
                            id="nominal"
                            placeholder="Enter nominal"
                            value="{{ old('nominal') }}"
                            min="1"
                        />
                        <label for="nominal">Nominal</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
