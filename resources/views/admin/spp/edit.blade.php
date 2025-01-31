@extends('admin.layouts')

@section('content')
<div class="p-5">
    <div class="card">
        <h5 class="card-header">Edit SPP</h5>
        <div class="card-body demo-vertical-spacing demo-only-element">
            <form action="{{ route('spp.update', $spp->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Dropdown Tahun -->
                <div class="form-floating form-floating-outline mb-6">
                    <select class="form-control" id="tahun" name="tahun">
                        <option selected disabled>Pilih Tahun</option>
                        @php
                            $currentYear = date('Y');
                        @endphp
                        @for ($i = $currentYear - 3; $i <= $currentYear + 5; $i++)
                            <option value="{{ $i }}" {{ old('tahun', $spp->tahun) == $i ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                    <label for="tahun">Tahun</label>
                </div>

                <!-- Input Nominal -->
                <div class="form-floating form-floating-outline mb-6">
                    <input type="number" name="nominal" class="form-control" id="nominal" placeholder="Enter nominal" value="{{ old('nominal', $spp->nominal) }}" />
                    <label for="nominal">Nominal</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
