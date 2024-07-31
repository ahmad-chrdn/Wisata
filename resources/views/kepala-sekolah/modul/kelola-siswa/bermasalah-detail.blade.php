@extends('layouts.app')

@section('title', 'Detail Siswa Bermasalah')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Siswa Bermasalah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a
                            href="{{ route('kepala_sekolah.kelola-siswa.bermasalah.index') }}">Data
                            Siswa Bermasalah</a></div>
                    <div class="breadcrumb-item">Detail Siswa Bermasalah</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Detail Siswa Bermasalah</h2>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-10">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Data {{ $masalah->siswa->nm_siswa }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr>
                                            <th>NIS</th>
                                            <th>:</th>
                                            <td>{{ $masalah->siswa->nis }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <td>{{ $masalah->siswa->nm_siswa }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <th>:</th>
                                            <td>{{ $masalah->siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>:</th>
                                            <td>{{ $masalah->siswa->kelas->nm_kelas }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jurusan</th>
                                            <th>:</th>
                                            <td>{{ $masalah->siswa->jurusan->nm_jurusan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Masalah</th>
                                            <th>:</th>
                                            <td>{{ $masalah->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>:</th>
                                            <td>{{ \Carbon\Carbon::parse($masalah->tanggal)->isoFormat('DD MMMM YYYY', 'id') }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- Tombol Kembali -->
                                <a href="{{ route('kepala_sekolah.kelola-siswa.bermasalah.index') }}"
                                    class="btn btn-success">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
