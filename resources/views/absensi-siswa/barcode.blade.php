@extends('layouts.absen')

@section('title', 'Absensi Siswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="text-dark">Silahkan isi form untuk absen</h4>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('absensi.barcode.store') }}">
                @csrf
                <div class="form-group">
                    <div class="float-right">
                        <a href="{{ route('absensi.riwayat.form') }}" class="text-small">
                            Lihat absensi anda
                        </a>
                    </div>
                    <label for="nis">NIS</label>
                    <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror"
                        name="nis" placeholder="Masukkan NIS Anda" value="{{ old('nis') }}">
                    @error('nis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    <script>
        @if (session('error'))
            iziToast.error({
                title: 'GAGAL!',
                message: '{{ session('error') }}',
                position: 'topRight'
            });
        @endif

        @if (session('success'))
            iziToast.success({
                title: 'BERHASIL!',
                message: '{{ session('success') }}',
                position: 'topRight'
            });
        @endif
    </script>
@endpush
