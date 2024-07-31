@extends('layouts.app')

@section('title', 'Data Wali Kelas')

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
                <h1>Wali Kelas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Kelola Wali Kelas</a></div>
                    <div class="breadcrumb-item">Data Wali Kelas</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Wali Kelas</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.wali-kelas.create') }}" class="btn btn-primary"
                                    style="margin-right: 10px;"><i class="fa fa-plus"></i> Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Foto</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->nip }}</td>
                                                    <td>{{ $user->nama }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/foto/' . $user->foto) }}" alt="Foto"
                                                            style="width: 50px; height: 50px;"
                                                            class="shadow-light rounded-circle">
                                                    </td>
                                                    <td>{{ $user->status }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.wali-kelas.destroy', $user->id) }}">
                                                            <a class="btn btn-success btn-sm"
                                                                href="{{ route('admin.wali-kelas.edit', $user->id) }}"
                                                                role="button">Edit</a>
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
