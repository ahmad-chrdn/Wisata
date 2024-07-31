@extends('layouts.app')

@section('title', 'Data Presensi Siswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Siswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Kelola Siswa</a></div>
                    <div class="breadcrumb-item">Data Presensi Siswa</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Presensi Siswa</h2>

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
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                                <th>Status</th>
                                                <th>Waktu Presensi</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($presensis as $presensi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $presensi->hari }}</td>
                                                    <td>{{ $presensi->siswa->nis }}</td>
                                                    <td>{{ $presensi->siswa->nm_siswa }}</td>
                                                    <td>{{ $presensi->siswa->kelas->nm_kelas }}</td>
                                                    <td>{{ $presensi->siswa->jurusan->nm_jurusan }}</td>
                                                    <td>{{ $presensi->status_presensi }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($presensi->waktu_presensi)->format('H:i:s / d-m-Y') }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-success btn-sm"
                                                            href="{{ route('guru_piket.kelola-siswa.presensi.edit', $presensi->id) }}"
                                                            role="button">Edit</a>
                                                    </td>
                                                </tr>
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
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    <script>
        // Message with toastr
        @if (session()->has('success'))
            iziToast.success({
                title: 'BERHASIL!',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @endif
    </script>
@endpush
