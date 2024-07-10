@extends('layouts.app')

@section('title', 'Jabatan')

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
                <h1>Jabatan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    {{-- <div class="breadcrumb-item"><a href="#">Kelola Pegawai</a></div> --}}
                    <div class="breadcrumb-item">Jabatan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Jabatan</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addJabatan"><i
                                        class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Jabatan</th>
                                                <th>Nama Jabatan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jabatans as $jabatan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $jabatan->kd_jabatan }}</td>
                                                    <td>{{ $jabatan->nm_jabatan }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.jabatan.destroy', $jabatan->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editJabatan{{ $jabatan->id }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                role="button">Hapus</button>
                                                        </form>
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

    <!-- Modal Tambah Jabatan -->
    <div class="modal fade" id="addJabatan" tabindex="-1" role="dialog" aria-labelledby="addJabatanLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJabatanLabel">Tambah Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir untuk menambahkan data -->
                    <form method="post" action="{{ route('admin.jabatan.store') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="kd_jabatan">Kode Jabatan</label>
                            <input type="text" id="kd_jabatan" name="kd_jabatan" class="form-control"
                                value="{{ $kdJabatan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_jabatan">Jabatan</label>
                            <input type="text" id="nm_jabatan" name="nm_jabatan" class="form-control"
                                placeholder="Masukkan Nama Jabatan" required autofocus>
                            <div class="invalid-feedback">
                                Jabatan wajib diisi.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jabatan -->
    @foreach ($jabatans as $jabatan)
        <div class="modal fade" id="editJabatan{{ $jabatan->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editJabatanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editJabatanLabel">Edit Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi formulir untuk mengedit data -->
                        <form method="post" action="{{ route('admin.jabatan.update', $jabatan->id) }}"
                            class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="kd_jabatan">Kode Jabatan</label>
                                <input type="text" id="kd_jabatan" name="kd_jabatan"
                                    value="{{ old('kd_jabatan', $jabatan->kd_jabatan) }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nm_jabatan">Nama Jabatan</label>
                                <input type="text" id="nm_jabatan" name="nm_jabatan"
                                    value="{{ old('nm_jabatan', $jabatan->nm_jabatan) }}" class="form-control"
                                    placeholder="Masukkan Nama Jabatan" required autofocus>
                                <div class="invalid-feedback">
                                    Jabatan wajib diisi.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <!-- JS Libraies -->
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
