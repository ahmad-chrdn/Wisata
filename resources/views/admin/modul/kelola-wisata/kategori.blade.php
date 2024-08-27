@extends('layouts.app')

@section('title', 'Data Kategori Wisata')

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
                <h1>Data Kategori Wisata</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Kelola Kategori Wisata</a></div>
                    <div class="breadcrumb-item">Data Kategori Wisata</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Kategori Wisata</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addKategori"><i
                                        class="fa fa-plus"></i> Tambah Kategori Wisata</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $category->nm_kategori }}</td>
                                                    <td>{{ $category->keterangan }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.kelola-wisata.kategori.destroy', $category->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editKategori{{ $category->id }}">Edit</a>
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

    <!-- Modal Tambah Kategori Wisata -->
    <div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="addKategoriLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addKategoriLabel">Tambah Kategori Wisata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir untuk menambahkan data kategori wisata -->
                    <form method="post" action="{{ route('admin.kelola-wisata.kategori.store') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="nm_kategori">Nama Kategori</label>
                            <input type="text" id="nm_kategori" name="nm_kategori" class="form-control"
                                placeholder="Masukkan Nama Kategori" required>
                            <div class="invalid-feedback">
                                Nama kategori wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                            <div class="invalid-feedback">
                                Keterangan wajib diisi.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kategori Wisata -->
    @foreach ($categories as $category)
        <div class="modal fade" id="editKategori{{ $category->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editKategoriLabel{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKategoriLabel{{ $category->id }}">Edit Kategori Wisata</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir untuk mengedit data kategori wisata -->
                        <form method="post" action="{{ route('admin.kelola-wisata.kategori.update', $category->id) }}"
                            class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nm_kategori{{ $category->id }}">Nama Kategori</label>
                                <input type="text" id="nm_kategori{{ $category->id }}" name="nm_kategori"
                                    class="form-control" value="{{ $category->nm_kategori }}" required>
                                <div class="invalid-feedback">
                                    Nama kategori wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan{{ $category->id }}">Keterangan</label>
                                <textarea id="keterangan{{ $category->id }}" name="keterangan" class="form-control" required>{{ $category->keterangan }}</textarea>
                                <div class="invalid-feedback">
                                    Keterangan wajib diisi.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        @if (session()->has('success'))
            iziToast.success({
                title: 'BERHASIL!',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @elseif ($errors->any())
            iziToast.error({
                title: 'GAGAL!',
                message: 'Terjadi kesalahan pada input data.',
                position: 'topCenter'
            });
        @endif
    </script>
@endpush
