@extends('layouts.app')

@section('title', 'Detail DUK')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>DUK</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Pegawai</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('admin.duk.index') }}">Naik Pangkat</a></div>
                    <div class="breadcrumb-item">Detail DUK</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Detail DUK</h2>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Data {{ $duks->pegawai->nm_pegawai }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr>
                                            <th>NIP</th>
                                            <th>:</th>
                                            <td>{{ $duks->pegawai->nip }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <td>{{ $duks->pegawai->nm_pegawai }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Terakhir</th>
                                            <th>:</th>
                                            <td>{{ $duks->pegawai->pendidikan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pangkat / Golongan / Ruang</th>
                                            <th>:</th>
                                            <td>{{ $duks->pegawai->pangkat->nm_pangkat }} /
                                                {{ $duks->pegawai->pangkat->gol_ruang }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Pangkat TMT</th>
                                            <th>:</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($duks->pegawai->pangkat_tmt)->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY', 'id') }}
                                            </td>
                                            {{-- <td>{{ date('d-m-Y', strtotime($duks->pegawai->pangkat_tmt)) }}</td> --}}
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <th>:</th>
                                            <td>{{ $duks->pegawai->jabatan->nm_jabatan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan TMT</th>
                                            <th>:</th>
                                            <td>
                                                {{ $duks->pegawai->jabatan_tmt ? \Carbon\Carbon::parse($duks->pegawai->jabatan_tmt)->isoFormat('DD MMMM YYYY') : '-' }}
                                            </td>
                                            {{-- <td>
                                                {{ $duks->pegawai->jabatan_tmt ? date('d-m-Y', strtotime($duks->pegawai->jabatan_tmt)) : '-' }}
                                            </td> --}}
                                        </tr>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>:</th>
                                            <td>
                                                {{ $duks->pegawai->keterangan ? $duks->pegawai->keterangan : '-' }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- Tombol Kembali -->
                                <a href="{{ route('admin.duk.index') }}" class="btn btn-success">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-dark">Pangkat YAD</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-md">
                                        <tr>
                                            <th>Pangkat / Golongan / Ruang</th>
                                            <th>:</th>
                                            <td>{{ $duks->pangkat->nm_pangkat }} /
                                                {{ $duks->pangkat->gol_ruang }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TMT</th>
                                            <th>:</th>
                                            <td>
                                                {{ \Carbon\Carbon::parse($duks->pangkatYad_tmt)->isoFormat('DD MMMM YYYY', 'Do MMMM YYYY', 'id') }}
                                            </td>
                                            {{-- <td>{{ date('d-m-Y', strtotime($duks->pangkatYad_tmt)) }}</td> --}}
                                        </tr>
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
    <script src="{{ asset('library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-table.js') }}"></script>
@endpush
