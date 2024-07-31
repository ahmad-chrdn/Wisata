@extends('layouts.app')

@section('title', 'Jurusan')

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
                <h1>Jurusan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Kelola Akademik</a></div>
                    <div class="breadcrumb-item">Data Jurusan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Jurusan</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addJurusan"><i
                                        class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Jurusan</th>
                                                <th>Nama Jurusan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jurusans as $jurusan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $jurusan->kd_jurusan }}</td>
                                                    <td>{{ $jurusan->nm_jurusan }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.kelola-akademik.jurusan.destroy', $jurusan->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editJurusan{{ $jurusan->id }}">Edit</a>
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

    <!-- Modal Tambah Jurusan -->
    <div class="modal fade" id="addJurusan" tabindex="-1" role="dialog" aria-labelledby="addJurusanLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJurusanLabel">Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir untuk menambahkan data -->
                    <form method="post" action="{{ route('admin.kelola-akademik.jurusan.store') }}"
                        class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="kd_jurusan">Kode Jurusan</label>
                            <input type="text" id="kd_jurusan" name="kd_jurusan" class="form-control"
                                value="{{ $kdJurusan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_jurusan">Nama Jurusan</label>
                            <input type="text" name="nm_jurusan" id="nm_jurusan" class="form-control"
                                placeholder="Masukkan nama jurusan" required autofocus>
                            <div class="invalid-feedback">
                                Nama Jurusan wajib diisi.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kelas -->
    @foreach ($jurusans as $jurusan)
        <div class="modal fade" id="editJurusan{{ $jurusan->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editJurusanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editJurusanLabel">Edit Jurusan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi formulir untuk mengedit data -->
                        <form method="post" action="{{ route('admin.kelola-akademik.jurusan.update', $jurusan->id) }}"
                            class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="kd_jurusan">Kode Jurusan</label>
                                <input type="text" id="kd_jurusan" name="kd_jurusan"
                                    value="{{ old('kd_jurusan', $jurusan->kd_jurusan) }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nm_jurusan">Nama Jurusan</label>
                                <input type="text" id="nm_jurusan" name="nm_jurusan"
                                    value="{{ old('nm_jurusan', $jurusan->nm_jurusan) }}" class="form-control"
                                    placeholder="Masukkan nama jurusan" required autofocus>
                                <div class="invalid-feedback">
                                    Nama Kelas wajib diisi.
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
