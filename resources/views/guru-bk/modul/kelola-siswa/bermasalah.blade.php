@extends('layouts.app')

@section('title', 'Data Siswa Bermasalah')

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
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addSiswa"><i
                                        class="fa fa-plus"></i> Tambah</a>
                            </div>
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
                                                            <form method="POST"
                                                                action="{{ route('guru_bk.kelola-siswa.bermasalah.destroy', $masalah->id) }}">
                                                                <a class="btn btn-success btn-sm" href="#"
                                                                    data-toggle="modal"
                                                                    data-target="#editSiswa{{ $masalah->id }}">Edit</a>
                                                                <a class="btn btn-dark btn-sm"
                                                                    href="{{ route('guru_bk.kelola-siswa.bermasalah.show', $masalah->id) }}">Detail</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Hapus</button>
                                                            </form>
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

    <!-- Modal Tambah Siswa -->
    <div class="modal fade" id="addSiswa" tabindex="-1" role="dialog" aria-labelledby="addSiswaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSiswaLabel">Tambah Siswa Bermasalah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('guru_bk.kelola-siswa.bermasalah.store') }}"
                        class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label>Hari</label><br>
                            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="hari"
                                        id="hari_{{ $day }}" value="{{ $day }}" required>
                                    <label class="form-check-label"
                                        for="hari_{{ $day }}">{{ $day }}</label>
                                </div>
                            @endforeach
                            <div class="invalid-feedback">
                                Hari wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="siswa_id">Siswa</label>
                            <select id="siswa_id" name="siswa_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Siswa</option>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nm_siswa }} ({{ $siswa->nis }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Siswa wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan Keterangan" required></textarea>
                            <div class="invalid-feedback">
                                Keterangan wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                            <div class="invalid-feedback">
                                Tanggal wajib diisi.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Siswa -->
    @foreach ($siswas as $siswa)
        @foreach ($siswa->masalahs as $masalah)
            <div class="modal fade" id="editSiswa{{ $masalah->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editSiswaLabel{{ $masalah->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSiswaLabel{{ $masalah->id }}">Edit Siswa Bermasalah</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post"
                                action="{{ route('guru_bk.kelola-siswa.bermasalah.update', $masalah->id) }}"
                                class="needs-validation" novalidate="">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Hari</label><br>
                                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hari"
                                                id="hari_{{ $day }}_{{ $masalah->id }}"
                                                value="{{ $day }}" {{ $masalah->hari == $day ? 'checked' : '' }}
                                                required>
                                            <label class="form-check-label"
                                                for="hari_{{ $day }}_{{ $masalah->id }}">{{ $day }}</label>
                                        </div>
                                    @endforeach
                                    <div class="invalid-feedback">
                                        Hari wajib dipilih.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="siswa_id{{ $masalah->id }}">Siswa</label>
                                    <select id="siswa_id{{ $masalah->id }}" name="siswa_id" class="form-control"
                                        required>
                                        <option value="" disabled>Pilih Siswa</option>
                                        @foreach ($siswas as $siswaItem)
                                            <option value="{{ $siswaItem->id }}"
                                                {{ $masalah->siswa_id == $siswaItem->id ? 'selected' : '' }}>
                                                {{ $siswaItem->nm_siswa }} ({{ $siswaItem->nis }})</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Siswa wajib dipilih.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan{{ $masalah->id }}">Keterangan</label>
                                    <textarea id="keterangan{{ $masalah->id }}" name="keterangan" class="form-control" required>{{ $masalah->keterangan }}</textarea>
                                    <div class="invalid-feedback">
                                        Keterangan wajib diisi.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal{{ $masalah->id }}">Tanggal</label>
                                    <input type="date" id="tanggal{{ $masalah->id }}" name="tanggal"
                                        class="form-control" value="{{ $masalah->tanggal }}" required>
                                    <div class="invalid-feedback">
                                        Tanggal wajib diisi.
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
        // Set default value for hari radio button and tanggal input
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            var hari = today.toLocaleString('id-ID', {
                weekday: 'long'
            });
            var tanggal = today.toISOString().split('T')[0];

            document.querySelector(`input[name="hari"][value="${hari}"]`).checked = true;
            document.querySelector('input[name="tanggal"]').value = tanggal;
        });

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
