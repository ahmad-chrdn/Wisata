@extends('layouts.absen')

@section('title', 'Riwayat Absensi Siswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="text-dark">Masukkan NIS untuk Melihat Riwayat Absensi</h4>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('absensi.riwayat') }}">
                @csrf
                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror"
                        name="nis" placeholder="Masukkan NIS Anda" value="{{ old('nis') }}">
                    @error('nis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Lihat Riwayat</button>
                <a href="{{ route('absensi.barcode.form') }}" class="btn btn-success">Kembali</a>
            </form>
        </div>

        @isset($absensi)
            <div class="card-body">
                @if ($absensi->isEmpty())
                    <p class="text-center">Tidak ada riwayat absensi untuk hari ini.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
                                    <th>Waktu Presensi</th>
                                    <th>Sesi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $absen)
                                    <tr>
                                        <td>{{ $absen->siswa->nis }}</td>
                                        <td>{{ $absen->siswa->nm_siswa }}</td>
                                        <td>{{ $absen->siswa->kelas->nm_kelas }}</td>
                                        <td>{{ $absen->siswa->jurusan->nm_jurusan }}</td>
                                        <td>{{ $absen->status_presensi }}</td>
                                        <td>{{ \Carbon\Carbon::parse($absen->waktu_presensi)->format('H:i:s / d-m-Y') }}
                                        </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($absen->waktu_presensi)->between(
                                                \Carbon\Carbon::createFromTime(7, 0),
                                                \Carbon\Carbon::createFromTime(12, 20),
                                            )
                                                ? 'Pagi'
                                                : 'Sore' }}
                                        </td>
                                    </tr>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endisset
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
@endpush
