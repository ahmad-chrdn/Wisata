@extends('layouts.absen')

@section('title', 'Absensi Siswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="text-dark">Form absensi sudah ditutup</h4>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                iziToast.error({
                    title: 'GAGAL!',
                    message: '{{ $error }}',
                    position: 'topRight'
                });
            @endforeach
        @endif
    </script>
@endpush
