@extends('layouts.app')

@section('title', 'Semester')

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
                <h1>Semester</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Kelola Akademik</a></div>
                    <div class="breadcrumb-item">Data Semester</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Semester</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addSemester"><i
                                        class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Semester</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($semesters as $semester)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $semester->semester }}</td>
                                                    <td>{{ $semester->thn_ajaran }}</td>
                                                    <td>{{ $semester->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.kelola-akademik.semester.destroy', $semester->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editSemester{{ $semester->id }}">Edit</a>
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

    <!-- Modal Tambah Semester -->
    <div class="modal fade" id="addSemester" tabindex="-1" role="dialog" aria-labelledby="addSemesterLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSemesterLabel">Tambah Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir untuk menambahkan data -->
                    <form method="post" action="{{ route('admin.kelola-akademik.semester.store') }}"
                        class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select id="semester" name="semester" class="form-control" required>
                                <option value="" selected disabled>Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                            <div class="invalid-feedback">
                                Semester wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="thn_ajaran">Tahun Ajaran</label>
                            <input type="text" id="thn_ajaran" name="thn_ajaran" class="form-control"
                                placeholder="Masukkan tahun ajaran" required>
                            <div class="invalid-feedback">
                                Tahun ajaran wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="" selected disabled>Pilih Status</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <div class="invalid-feedback">
                                Status wajib dipilih.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Semester -->
    @foreach ($semesters as $semester)
        <div class="modal fade" id="editSemester{{ $semester->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editSemesterLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSemesterLabel">Edit Semester</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi formulir untuk mengedit data -->
                        <form method="post" action="{{ route('admin.kelola-akademik.semester.update', $semester->id) }}"
                            class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="semester">Semester</label>
                                <select id="semester" name="semester" class="form-control" required>
                                    <option value="" disabled>Pilih Semester</option>
                                    <option value="Ganjil" {{ $semester->semester == 'Ganjil' ? 'selected' : '' }}>Ganjil
                                    </option>
                                    <option value="Genap" {{ $semester->semester == 'Genap' ? 'selected' : '' }}>Genap
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    Semester wajib dipilih.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="thn_ajaran">Tahun Ajaran</label>
                                <input type="text" id="thn_ajaran" name="thn_ajaran"
                                    value="{{ old('thn_ajaran', $semester->thn_ajaran) }}" class="form-control"
                                    placeholder="Masukkan tahun ajaran" required>
                                <div class="invalid-feedback">
                                    Tahun ajaran wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="1" {{ $semester->status == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $semester->status == 0 ? 'selected' : '' }}>Tidak Aktif
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    Status wajib dipilih.
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
