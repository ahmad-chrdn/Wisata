@extends('layouts.error')

@section('title', '419')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="page-error">
        <div class="page-inner">
            <h1>419</h1>
            <div class="page-description">
                Halaman Kadaluwarsa.
            </div>

            <div class="mt-3">
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
