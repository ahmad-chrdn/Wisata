@extends('layouts.app')

@section('title', 'Kelas')

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
                <h1>Kelas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Kelas</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Kelas</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addKelas"><i
                                        class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Kelas</th>
                                                <th>Nama Kelas</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelass as $kelas)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kelas->kd_kelas }}</td>
                                                    <td>{{ $kelas->nm_kelas }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.kelola-akademik.kelas.destroy', $kelas->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editKelas{{ $kelas->id }}">Edit</a>
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

    <!-- Modal Tambah Kelas -->
    <div class="modal fade" id="addKelas" tabindex="-1" role="dialog" aria-labelledby="addKelasLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKelasLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir untuk menambahkan data -->
                    <form method="post" action="{{ route('admin.kelola-akademik.kelas.store') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="kd_kelas">Kode Kelas</label>
                            <input type="text" id="kd_kelas" name="kd_kelas" class="form-control"
                                value="{{ $kdKelas }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_kelas">Nama Kelas</label>
                            <input type="text" name="nm_kelas" id="nm_kelas" class="form-control"
                                placeholder="Masukkan nama kelas" required autofocus>
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

    <!-- Modal Edit Kelas -->
    @foreach ($kelass as $kelas)
        <div class="modal fade" id="editKelas{{ $kelas->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editKelasLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKelasLabel">Edit Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi formulir untuk mengedit data -->
                        <form method="post" action="{{ route('admin.kelola-akademik.kelas.update', $kelas->id) }}"
                            class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="kd_kelas">Kode Kelas</label>
                                <input type="text" id="kd_kelas" name="kd_kelas"
                                    value="{{ old('kd_kelas', $kelas->kd_kelas) }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nm_kelas">Nama Kelas</label>
                                <input type="text" id="nm_kelas" name="nm_kelas"
                                    value="{{ old('nm_kelas', $kelas->nm_kelas) }}" class="form-control"
                                    placeholder="Masukkan nama kelas" required autofocus>
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
