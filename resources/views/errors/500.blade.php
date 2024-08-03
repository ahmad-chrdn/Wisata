@extends('layouts.error')

@section('title', '500')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="page-error">
        <div class="page-inner">
            <h1>500</h1>
            <div class="page-description">
                Maaf, ada kesalahan server.
            </div>

            <div class="mt-3">
                @php
                    $role = auth()->user()->role ?? 'guest';
                @endphp

                @if ($role == 'admin')
                    <a href="{{ route('admin.dashboard') }}">Kembali ke Beranda Admin</a>
                @elseif($role == 'kepala sekolah')
                    <a href="{{ route('kepala_sekolah.dashboard') }}">Kembali ke Beranda Kepala Sekolah</a>
                @elseif($role == 'guru bk')
                    <a href="{{ route('guru_bk.dashboard') }}">Kembali ke Beranda Guru BK</a>
                @elseif($role == 'wali kelas')
                    <a href="{{ route('wali_kelas.dashboard') }}">Kembali ke Beranda Wali Kelas</a>
                @elseif($role == 'guru piket')
                    <a href="{{ route('guru_piket.dashboard') }}">Kembali ke Beranda Guru Piket</a>
                @else
                    <a href="{{ url('/') }}">Kembali ke Beranda</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
