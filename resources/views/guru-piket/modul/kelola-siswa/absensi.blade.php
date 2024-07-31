@extends('layouts.app')

@section('title', 'Absensi Siswa')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Absensi Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Kelola Siswa</a></div>
                    <div class="breadcrumb-item">Absensi Siswa</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Absensi Manual Siswa</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="post" action="{{ route('guru_piket.kelola-siswa.absensi.store') }}">
                                @csrf
                                <div class="card-header">
                                    <h4 class="text-dark">Keterangan Siswa</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input id="nis" type="text"
                                            class="form-control @error('nis') is-invalid @enderror" name="nis"
                                            placeholder="Masukkan NIS" value="{{ old('nis') }}">
                                        @error('nis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Status Kehadiran</label><br>
                                        @foreach (['Hadir', 'Izin', 'Sakit', 'Alpa', 'Terlambat'] as $status)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_presensi"
                                                    id="status_{{ $status }}" value="{{ $status }}" required>
                                                <label class="form-check-label"
                                                    for="status_{{ $status }}">{{ $status }}</label>
                                            </div>
                                        @endforeach
                                        @error('status_presensi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                </div>
                            </form>
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
