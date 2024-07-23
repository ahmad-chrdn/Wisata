@extends('layouts.app')

@section('title', 'Data Siswa')

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
                    <div class="breadcrumb-item">Data Siswa</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Siswa</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addSiswa"><i
                                        class="fa fa-plus"></i> Tambah Siswa</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Kelas</th>
                                                <th>Jurusan</th>
                                                <th>Semester</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswas as $siswa)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $siswa->nis }}</td>
                                                    <td>{{ $siswa->nm_siswa }}</td>
                                                    <td>{{ $siswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                    <td>{{ $siswa->kelas->nm_kelas }}</td>
                                                    <td>{{ $siswa->jurusan->nm_jurusan }}</td>
                                                    <td>{{ $siswa->semester->semester }}</td>
                                                    <td>{{ $siswa->status_siswa == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('kepala_sekolah.profile.destroy', $siswa->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editSiswa{{ $siswa->id }}">Edit</a>
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

    <!-- Modal Tambah Siswa -->
    <div class="modal fade" id="addSiswa" tabindex="-1" role="dialog" aria-labelledby="addSiswaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSiswaLabel">Tambah Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi formulir untuk menambahkan data -->
                    <form method="post" action="{{ route('admin.kelola-siswa.siswa.store') }}" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="text" id="nis" name="nis" class="form-control"
                                placeholder="Masukkan NIS" required>
                            <div class="invalid-feedback">
                                NIS wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_siswa">Nama Siswa</label>
                            <input type="text" id="nm_siswa" name="nm_siswa" class="form-control"
                                placeholder="Masukkan Nama Siswa" required>
                            <div class="invalid-feedback">
                                Nama siswa wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_l" value="L"
                                    required>
                                <label class="form-check-label" for="jk_l">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_p" value="P"
                                    required>
                                <label class="form-check-label" for="jk_p">Perempuan</label>
                            </div>
                            <div class="invalid-feedback">
                                Jenis kelamin wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select id="kelas_id" name="kelas_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Kelas</option>
                                @foreach ($kelass as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nm_kelas }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Kelas wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jurusan_id">Jurusan</label>
                            <select id="jurusan_id" name="jurusan_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Jurusan</option>
                                @foreach ($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}">{{ $jurusan->nm_jurusan }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Jurusan wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="semester_id">Semester</label>
                            <select id="semester_id" name="semester_id" class="form-control" required>
                                <option value="" selected disabled>Pilih Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">
                                        {{ $semester->semester }} ({{ $semester->thn_ajaran }})
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Semester wajib dipilih.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status_siswa">Status</label>
                            <select id="status_siswa" name="status_siswa" class="form-control" required>
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

    <!-- Modal Edit Siswa -->
    @foreach ($siswas as $siswa)
        <div class="modal fade" id="editSiswa{{ $siswa->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editSiswaLabel{{ $siswa->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSiswaLabel{{ $siswa->id }}">Edit Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Isi formulir untuk mengedit data -->
                        <form method="post" action="{{ route('admin.kelola-siswa.siswa.update', $siswa->id) }}"
                            class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nis{{ $siswa->id }}">NIS</label>
                                <input type="text" id="nis{{ $siswa->id }}" name="nis" class="form-control"
                                    value="{{ $siswa->nis }}" required>
                                <div class="invalid-feedback">
                                    NIS wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nm_siswa{{ $siswa->id }}">Nama Siswa</label>
                                <input type="text" id="nm_siswa{{ $siswa->id }}" name="nm_siswa"
                                    class="form-control" value="{{ $siswa->nm_siswa }}" required>
                                <div class="invalid-feedback">
                                    Nama siswa wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk"
                                        id="jk_l{{ $siswa->id }}" value="L"
                                        {{ $siswa->jk == 'L' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jk_l{{ $siswa->id }}">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk"
                                        id="jk_p{{ $siswa->id }}" value="P"
                                        {{ $siswa->jk == 'P' ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="jk_p{{ $siswa->id }}">Perempuan</label>
                                </div>
                                <div class="invalid-feedback">
                                    Jenis kelamin wajib dipilih.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kelas_id{{ $siswa->id }}">Kelas</label>
                                <select id="kelas_id{{ $siswa->id }}" name="kelas_id" class="form-control" required>
                                    <option value="" disabled>Pilih Kelas</option>
                                    @foreach ($kelass as $kelas)
                                        <option value="{{ $kelas->id }}"
                                            {{ $siswa->kelas_id == $kelas->id ? 'selected' : '' }}>{{ $kelas->nm_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Kelas wajib dipilih.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="jurusan_id{{ $siswa->id }}">Jurusan</label>
                                <select id="jurusan_id{{ $siswa->id }}" name="jurusan_id" class="form-control"
                                    required>
                                    <option value="" disabled>Pilih Jurusan</option>
                                    @foreach ($jurusans as $jurusan)
                                        <option value="{{ $jurusan->id }}"
                                            {{ $siswa->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                                            {{ $jurusan->nm_jurusan }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Jurusan wajib dipilih.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="semester_id{{ $siswa->id }}">Semester</label>
                                <select id="semester_id{{ $siswa->id }}" name="semester_id" class="form-control"
                                    required>
                                    <option value="" disabled>Pilih Semester</option>
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}"
                                            {{ $siswa->semester_id == $semester->id ? 'selected' : '' }}>
                                            {{ $semester->semester }} ({{ $semester->thn_ajaran }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Semester wajib dipilih.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_siswa{{ $siswa->id }}">Status</label>
                                <select id="status_siswa{{ $siswa->id }}" name="status_siswa" class="form-control"
                                    required>
                                    <option value="1" {{ $siswa->status_siswa == 1 ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="0" {{ $siswa->status_siswa == 0 ? 'selected' : '' }}>Tidak Aktif
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    Status wajib dipilih.
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
        @elseif ($errors->has('nis'))
            iziToast.error({
                title: 'GAGAL!',
                message: 'Panjang NIS harus 10 karakter.',
                position: 'topCenter'
            });
        @endif
    </script>
@endpush
