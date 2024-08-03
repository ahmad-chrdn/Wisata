@extends('layouts.app')

@section('title', 'Rekapitulasi Kehadiran Siswa')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rekapitulasi Kehadiran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('guru_piket.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Rekapitulasi</a></div>
                    <div class="breadcrumb-item">Kelas {{ $kelas->nm_kelas }}</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Rekapitulasi Kehadiran Siswa</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form method="POST" action="{{ route('guru_piket.rekapitulasi.rekap', $kelas->id) }}">
                                    @csrf
                                    <div class="dropdown d-inline mr-2">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownJurusanButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ isset($jurusan_id) ? $jurusans->find($jurusan_id)->nm_jurusan : 'Pilih Jurusan' }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownJurusanButton">
                                            @foreach ($jurusans as $jurusan)
                                                <a class="dropdown-item" href="#"
                                                    data-value="{{ $jurusan->id }}">{{ $jurusan->nm_jurusan }}</a>
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="jurusan_id" id="jurusan_id"
                                            value="{{ isset($jurusan_id) ? $jurusan_id : '' }}" required>
                                    </div>
                                    <div class="dropdown d-inline mr-2">
                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                            id="dropdownSemesterButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ isset($semester_id) ? $semesters->find($semester_id)->semester . ' (' . $semesters->find($semester_id)->thn_ajaran . ')' : 'Semester / Tahun Ajaran' }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownSemesterButton">
                                            @foreach ($semesters as $semester)
                                                <a class="dropdown-item" href="#"
                                                    data-value="{{ $semester->id }}">{{ $semester->semester }}
                                                    ({{ $semester->thn_ajaran }})
                                                </a>
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="semester_id" id="semester_id"
                                            value="{{ isset($semester_id) ? $semester_id : '' }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                </form>
                            </div>
                            <div class="card-body">
                                @if (isset($rekapitulasi))
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Siswa</th>
                                                    <th>NIS</th>
                                                    <th>Alpa</th>
                                                    <th>Izin</th>
                                                    <th>Sakit</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rekapitulasi as $index => $rekap)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $rekap['nama'] }}</td>
                                                        <td>{{ $rekap['nis'] }}</td>
                                                        <td>{{ $rekap['alpa'] }}</td>
                                                        <td>{{ $rekap['izin'] }}</td>
                                                        <td>{{ $rekap['sakit'] }}</td>
                                                        <td>{{ $rekap['total'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p>Silakan pilih jurusan dan semester untuk melihat rekapitulasi.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-item').on('click', function() {
                var value = $(this).data('value');
                var parentDropdown = $(this).parents('.dropdown').find('input[type="hidden"]');
                parentDropdown.val(value);
                $(this).parents('.dropdown').find('.dropdown-toggle').text($(this).text());
            });
        });
    </script>
@endpush
