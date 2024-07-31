@extends('layouts.app')

@section('title', 'Data Siswa Bermasalah')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Siswa Bermasalah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Kelola Siswa</a></div>
                    <div class="breadcrumb-item">Data Siswa Bermasalah</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Siswa Bermasalah</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Hari</th>
                                                <th>Nis</th>
                                                <th>Nama Siswa</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswas as $siswa)
                                                @foreach ($siswa->masalahs as $masalah)
                                                    <tr>
                                                        <td>{{ $loop->parent->iteration }}</td>
                                                        <td>{{ $masalah->hari }}</td>
                                                        <td>{{ $siswa->nis }}</td>
                                                        <td>{{ $siswa->nm_siswa }}</td>
                                                        <td>{{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                        <td>{{ $siswa->kelas->nm_kelas }}</td>
                                                        <td>{{ $siswa->jurusan->nm_jurusan }}</td>
                                                        <td>{{ $masalah->keterangan }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($masalah->tanggal)->format('d-m-Y') }}
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-dark btn-sm"
                                                                href="{{ route('kepala_sekolah.kelola-siswa.bermasalah.show', $masalah->id) }}">Detail</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
