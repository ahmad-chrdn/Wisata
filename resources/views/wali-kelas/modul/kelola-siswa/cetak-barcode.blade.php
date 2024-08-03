@extends('layouts.app')

@section('title', 'Barcode Presensi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Barcode</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('wali_kelas.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Kelola Siswa</a></div>
                    <div class="breadcrumb-item">Barcode Presensi</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Barcode Presensi</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('wali_kelas.barcode.download') }}" class="btn btn-danger btn-md"><i
                                        class="fa fa-download"></i> Cetak Barcode</a>
                            </div>
                            <div class="card-body text-center">
                                {{-- Alamat Absensi Siswa --}}
                                {!! QrCode::size(250)->generate('http://192.168.5.45:9090/absensi/siswa') !!}
                                <p style="color: red;">Barcode ini digunakan untuk absensi siswa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
