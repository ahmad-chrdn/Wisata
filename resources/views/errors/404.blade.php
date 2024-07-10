@extends('layouts.error')

@section('title', '404')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="page-error">
        <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
                Halaman yang Anda cari tidak dapat ditemukan.
            </div>

            <div class="mt-3">
                <a href="{{ route('admin.dashboard') }}">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
