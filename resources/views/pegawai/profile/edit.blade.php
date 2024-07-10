@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profil</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hai, {{ auth()->user()->nama }}</h2>
                <p class="section-lead">
                    Ubah informasi tentang diri Anda di halaman ini.
                </p>

                <div class="row mt-sm-4">
                    @include('pegawai.profile.partials.edit-profile')
                    @include('pegawai.profile.partials.edit-password')
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
