@extends('layouts.app')

@section('title', 'DUK')

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
                <h1>Kenaikan Pangkat</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Pegawai</a></div>
                    <div class="breadcrumb-item">Naik Pangkat</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data DUK</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addDUK"><i
                                        class="fa fa-plus"></i>
                                    Tambah</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIP</th>
                                                <th>Nama Pegawai</th>
                                                <th>Pangkat Lama / Golongan / Ruang / TMT</th>
                                                <th>Pangkat YAD / Golongan / Ruang / TMT</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($duks as $duk)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $duk->pegawai->nip }}</td>
                                                    <td>{{ $duk->pegawai->nm_pegawai }}</td>
                                                    <td>{{ $duk->pegawai->pangkat->nm_pangkat }} /
                                                        {{ $duk->pegawai->pangkat->gol_ruang }} /
                                                        {{ \Carbon\Carbon::parse($duk->pegawai->pangkat_tmt)->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY', 'id') }}
                                                    </td>
                                                    {{-- <td>{{ date('d-m-Y', strtotime($duk->pegawai->pangkat_tmt)) }}</td> --}}
                                                    <td>{{ $duk->pangkat->nm_pangkat }} /
                                                        {{ $duk->pangkat->gol_ruang }} /
                                                        {{ \Carbon\Carbon::parse($duk->pangkatYad_tmt)->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY', 'id') }}
                                                    </td>
                                                    {{-- <td>{{ date('d-m-Y', strtotime($duk->pangkatYad_tmt)) }}</td> --}}
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.duk.destroy', $duk->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editDUK{{ $duk->id }}">Edit</a>
                                                            <a class="btn btn-dark btn-sm"
                                                                href="{{ route('admin.duk.show', $duk->id) }}">Detail</a>
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

    <!-- Modal Tambah DUK -->
    <div class="modal fade" id="addDUK" tabindex="-1" role="dialog" aria-labelledby="addDUKLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDUKLabel">Tambah DUK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.duk.store') }}" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="pegawai_id">Nama Pegawai / NIP</label>
                            <select class="form-control @error('pegawai_id') is-invalid @enderror" id="pegawai_id"
                                name="pegawai_id" required autofocus>
                                <option value="" selected disabled hidden>Pilih Pegawai</option>
                                @foreach ($pegawaiList as $pegawai)
                                    <option value="{{ $pegawai->id }}"
                                        {{ old('pegawai_id') == $pegawai->id ? 'selected' : '' }}>
                                        {{ $pegawai->nm_pegawai }} / {{ $pegawai->nip }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pegawai_id')
                                <div class="invalid-feedback">
                                    Pegawai dengan NIP tersebut sudah ada sebelumnya.
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pegawai_info">Pangkat Lama / Golongan / Ruang / TMT</label>
                            <input type="text" id="pegawai_info" name="pegawai_info" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="info_jabatan">Jabatan</label>
                            <textarea class="form-control" id="info_jabatan" name="info_jabatan" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label for="pangkat_id">Pangkat YAD</label>
                            <select class="form-control" id="pangkat_id" name="pangkat_id" required autofocus>
                                <option value="" selected disabled hidden>Pilih Pangkat / Golongan / Ruang</option>
                                @foreach ($pangkatList as $pangkat)
                                    <option value="{{ $pangkat->id }}"
                                        {{ old('pangkat_id') == $pangkat->id ? 'selected' : '' }}>
                                        {{ $pangkat->nm_pangkat }} / {{ $pangkat->gol_ruang }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Pangkat YAD wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pangkatYad_tmt">TMT</label>
                            <input type="date" id="pangkatYad_tmt" name="pangkatYad_tmt"
                                value="{{ old('pangkatYad_tmt') }}" class="form-control" required autofocus>
                            <div class="invalid-feedback">
                                TMT wajib diisi.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit DUK -->
    @foreach ($duks as $duk)
        <div class="modal fade" id="editDUK{{ $duk->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editDUKLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDUKLabel">Edit DUK</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('admin.duk.update', $duk->id) }}" class="needs-validation"
                            novalidate="">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="pegawai_id_edit">Nama Pegawai / NIP</label>
                                <select class="form-control" id="pegawai_id_edit" name="pegawai_id" required autofocus>
                                    <option value="" selected disabled>-- Pilih Pegawai --</option>
                                    @foreach ($pegawaiList as $pegawai)
                                        <option value="{{ $pegawai->id }}"
                                            {{ old('pegawai_id', $duk->pegawai_id) == $pegawai->id ? 'selected' : '' }}>
                                            {{ $pegawai->nm_pegawai }} / {{ $pegawai->nip }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pegawai_info_edit">Pangkat Lama / Golongan / Ruang / TMT</label>
                                <input type="text" id="pegawai_info_edit" name="pegawai_info" class="form-control"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="info_jabatan_edit">Jabatan</label>
                                <textarea class="form-control" id="info_jabatan_edit" name="info_jabatan" readonly></textarea>
                            </div>
                            <div class="form-group">
                                <label for="pangkat_id_edit">Pangkat YAD</label>
                                <select class="form-control" id="pangkat_id_edit" name="pangkat_id" required autofocus>
                                    <option value="" selected disabled>-- Pilih Pangkat / Golongan / Ruang --
                                    </option>
                                    @foreach ($pangkatList as $pangkat)
                                        <option value="{{ $pangkat->id }}"
                                            {{ old('pangkat_id', $duk->pangkat_id) == $pangkat->id ? 'selected' : '' }}>
                                            {{ $pangkat->nm_pangkat }} / {{ $pangkat->gol_ruang }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Pangkat YAD wajib dipilih.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pangkatYad_tmt_edit">TMT</label>
                                <input type="date" id="pangkatYad_tmt_edit" name="pangkatYad_tmt"
                                    value="{{ old('pangkatYad_tmt', $duk->pangkatYad_tmt) }}" class="form-control"
                                    required autofocus>
                                <div class="invalid-feedback">
                                    TMT wajib diisi.
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            {{-- <button type="reset" class="btn btn-warning">Reset</button> --}}
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
        @if (session()->has('success'))
            iziToast.success({
                title: 'BERHASIL!',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @elseif ($errors->has('pegawai_id'))
            iziToast.error({
                title: 'GAGAL!',
                message: 'Pegawai dengan NIP tersebut sudah ada sebelumnya.',
                position: 'topCenter'
            });
        @endif
    </script>

    <script>
        // Deklarasi variabel pegawaiList
        var pegawaiList = {!! json_encode(
            $pegawaiList->map(function ($pegawai) {
                    return [
                        'id' => $pegawai->id,
                        'pangkat_id' => $pegawai->pangkat->id,
                        'pangkat_info' =>
                            $pegawai->pangkat->nm_pangkat .
                            ' / ' .
                            $pegawai->pangkat->gol_ruang .
                            ' / ' .
                            \Carbon\Carbon::parse($pegawai->pangkat_tmt)->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY', 'id'),
                    ];
                })->pluck('pangkat_info', 'id'),
        ) !!};

        // Deklarasi variabel jabatanList
        var jabatanList = {!! json_encode(
            $pegawaiList->map(function ($pegawai) {
                    return [
                        'id' => $pegawai->id,
                        'jabatan_info' => $pegawai->jabatan->nm_jabatan,
                    ];
                })->pluck('jabatan_info', 'id'),
        ) !!};

        // Tangani perubahan pada dropdown pegawai_id pada modal tambah
        $('#pegawai_id').on('change', function() {
            var pegawaiId = $(this).val();
            if (pegawaiId) {
                var pangkatInfo = pegawaiList[pegawaiId];
                $('#pegawai_info').val(pangkatInfo);

                var jabatanInfo = jabatanList[pegawaiId];
                $('#info_jabatan').val(jabatanInfo);
            }
        });

        // Tangani perubahan pada dropdown pegawai_id pada modal edit
        @foreach ($duks as $duk)
            $('#editDUK{{ $duk->id }}').find('#pegawai_id_edit').on('change', function() {
                var pegawaiId = $(this).val();
                if (pegawaiId) {
                    var pangkatInfo = pegawaiList[pegawaiId];
                    $(this).closest('.modal-content').find('#pegawai_info_edit').val(pangkatInfo);

                    var jabatanInfo = jabatanList[pegawaiId];
                    $(this).closest('.modal-content').find('#info_jabatan_edit').val(jabatanInfo);
                }
            });
        @endforeach

        // Tangani pengisian otomatis field "Pangkat Lama / Golongan / Ruang / TMT" dan "Jabatan" pada modal edit
        @foreach ($duks as $duk)
            $('#editDUK{{ $duk->id }}').on('shown.bs.modal', function(e) {
                // Mendapatkan nilai ID pegawai yang dipilih saat mengklik tombol Edit pada modal tertentu
                var selectedPegawaiId = $(this).find('#pegawai_id_edit').val();

                // Memeriksa apakah ID pegawai terisi
                if (selectedPegawaiId) {
                    // Mengisi field "Pangkat Lama / Golongan / Ruang / TMT" sesuai dengan pegawai yang dipilih
                    var pangkatInfo = pegawaiList[selectedPegawaiId];
                    $(this).find('#pegawai_info_edit').val(pangkatInfo);

                    // Mengisi field "Jabatan" sesuai dengan pegawai yang dipilih
                    var jabatanInfo = jabatanList[selectedPegawaiId];
                    $(this).find('#info_jabatan_edit').val(jabatanInfo);
                }
            });
        @endforeach
    </script>
@endpush
