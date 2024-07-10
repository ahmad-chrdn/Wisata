@extends('layouts.app')

@section('title', 'Pangkat')

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
                <h1>Pangkat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    {{-- <div class="breadcrumb-item"><a href="#">Kelola Pegawai</a></div> --}}
                    <div class="breadcrumb-item">Pangkat</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Pangkat</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addPangkat"><i
                                        class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Pangkat</th>
                                                <th>Nama Pangkat</th>
                                                <th>Golongan / Ruang</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pangkats as $pangkat)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pangkat->kd_pangkat }}</td>
                                                    <td>{{ $pangkat->nm_pangkat }}</td>
                                                    <td>{{ $pangkat->gol_ruang }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.pangkat.destroy', $pangkat->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editPangkat{{ $pangkat->id }}">Edit</a>
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

    <!-- Modal Tambah Pangkat -->
    <div class="modal fade" id="addPangkat" tabindex="-1" role="dialog" aria-labelledby="addPangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPangkatLabel">Tambah Pangkat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir untuk menambahkan data -->
                    <form method="post" action="{{ route('admin.pangkat.store') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="kd_pangkat">Kode Pangkat</label>
                            <input type="text" id="kd_pangkat" name="kd_pangkat" class="form-control"
                                value="{{ $kdPangkat }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_pangkat">Pangkat</label>
                            <input type="text" name="nm_pangkat" id="nm_pangkat" class="form-control"
                                placeholder="Masukkan nama pangkat" required autofocus>
                            <div class="invalid-feedback">
                                Pangkat wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gol_ruang">Golongan / Ruang</label>
                            <select id="gol_ruang" name="gol_ruang" class="form-control" required autofocus>
                                <option value="" selected disabled hidden>Pilih Golongan / Ruang</option>
                                <option value="I / a">I / a</option>
                                <option value="I / b">I / b</option>
                                <option value="I / c">I / c</option>
                                <option value="I / d">I / d</option>
                                <option value="II / a">II / a</option>
                                <option value="II / b">II / b</option>
                                <option value="II / c">II / c</option>
                                <option value="II / d">II / d</option>
                                <option value="III / a">III / a</option>
                                <option value="III / b">III / b</option>
                                <option value="III / c">III / c</option>
                                <option value="III / d">III / d</option>
                                <option value="IV / a">IV / a</option>
                                <option value="IV / b">IV / b</option>
                                <option value="IV / c">IV / c</option>
                                <option value="IV / d">IV / d</option>
                                <option value="IV / e">IV / e</option>
                            </select>
                            <div class="invalid-feedback">
                                Golongan / Ruang wajib dipilih.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pangkat -->
    @foreach ($pangkats as $pangkat)
        <div class="modal fade" id="editPangkat{{ $pangkat->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editPangkatLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPangkatLabel">Edit Pangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi formulir untuk mengedit data -->
                        <form method="post" action="{{ route('admin.pangkat.update', $pangkat->id) }}"
                            class="needs-validation" novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="kd_pangkat">Kode Pangkat</label>
                                <input type="text" id="kd_pangkat" name="kd_pangkat"
                                    value="{{ old('kd_pangkat', $pangkat->kd_pangkat) }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nm_pangkat">Nama Pangkat</label>
                                <input type="text" id="nm_pangkat" name="nm_pangkat"
                                    value="{{ old('nm_pangkat', $pangkat->nm_pangkat) }}" class="form-control"
                                    placeholder="Masukkan nama pangkat" required autofocus>
                                <div class="invalid-feedback">
                                    Nama Pangkat wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gol_ruang">Golongan / Ruang</label>
                                <select id="gol_ruang" name="gol_ruang" class="form-control" required autofocus>
                                    <option value="" selected disabled>Pilih Golongan / Ruang</option>
                                    <option value="I / a" {{ $pangkat->gol_ruang == 'I / a' ? 'selected' : '' }}>I / a
                                    </option>
                                    <option value="I / b" {{ $pangkat->gol_ruang == 'I / b' ? 'selected' : '' }}>I / b
                                    </option>
                                    <option value="I / c" {{ $pangkat->gol_ruang == 'I / c' ? 'selected' : '' }}>I / c
                                    </option>
                                    <option value="I / d" {{ $pangkat->gol_ruang == 'I / d' ? 'selected' : '' }}>I / d
                                    </option>
                                    <option value="II / a" {{ $pangkat->gol_ruang == 'II / a' ? 'selected' : '' }}>II / a
                                    </option>
                                    <option value="II / b" {{ $pangkat->gol_ruang == 'II / b' ? 'selected' : '' }}>II / b
                                    </option>
                                    <option value="II / c" {{ $pangkat->gol_ruang == 'II / c' ? 'selected' : '' }}>II / c
                                    </option>
                                    <option value="II / d" {{ $pangkat->gol_ruang == 'II / d' ? 'selected' : '' }}>II / d
                                    </option>
                                    <option value="III / a" {{ $pangkat->gol_ruang == 'III / a' ? 'selected' : '' }}>III /
                                        a</option>
                                    <option value="III / b" {{ $pangkat->gol_ruang == 'III / b' ? 'selected' : '' }}>III /
                                        b</option>
                                    <option value="III / c" {{ $pangkat->gol_ruang == 'III / c' ? 'selected' : '' }}>III /
                                        c</option>
                                    <option value="III / d" {{ $pangkat->gol_ruang == 'III / d' ? 'selected' : '' }}>III /
                                        d</option>
                                    <option value="IV / a" {{ $pangkat->gol_ruang == 'IV / a' ? 'selected' : '' }}>IV / a
                                    </option>
                                    <option value="IV / b" {{ $pangkat->gol_ruang == 'IV / b' ? 'selected' : '' }}>IV / b
                                    </option>
                                    <option value="IV / c" {{ $pangkat->gol_ruang == 'IV / c' ? 'selected' : '' }}>IV / c
                                    </option>
                                    <option value="IV / d" {{ $pangkat->gol_ruang == 'IV / d' ? 'selected' : '' }}>IV / d
                                    </option>
                                    <option value="IV / e" {{ $pangkat->gol_ruang == 'IV / e' ? 'selected' : '' }}>IV / e
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    Golongan / Ruang wajib dipilih.
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
