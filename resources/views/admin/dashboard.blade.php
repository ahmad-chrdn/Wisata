@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <div
                        class="hero bg-primary text-white d-flex align-items-left align-items-md-center flex-column flex-md-row">
                        <div class="hero-inner">
                            <h2>Halo, <b class="text-warning">{{ auth()->user()->nama }}</b></h2>
                            <p class="lead">Selamat Datang, di Website Kehadiran.</p>
                        </div>
                        <div id="jam" class="ml-md-auto py-2 py-md-0" style="font-size: 30px;"></div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-dark">Informasi Sekolah</h3>
                        </div>
                        <div class="card-body">
                            {{-- @if ($genderData['laki_laki'] || $genderData['perempuan'])
                                <canvas id="myChart"></canvas>
                            @else
                                <p>Belum ada data pegawai berdasarkan jenis kelamin.</p>
                            @endif --}}
                            <img src="{{ asset('img/products/product-3.jpg') }}" alt="Logo" class="logo-image"
                                style="width: 140px; height: auto;">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                                classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                                Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure
                                Latin
                                words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in
                                classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                                1.10.32
                                and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
                                written in 45 BC. This book is a treatise on the theory of ethics, very popular during the
                                Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a
                                line in
                                section 1.10.32.

                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                interested.
                                Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also
                                reproduced
                                in their exact original form, accompanied by English versions from the 1914 translation by
                                H.
                                Rackham.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.pangkat.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Siswa</h4>
                                </div>
                                <div class="card-body">
                                    {{-- {{ $totalPangkat }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.pegawai.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Wali Kelas</h4>
                                </div>
                                <div class="card-body">
                                    {{-- {{ $totalPegawai }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.pegawai.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Guru Piket</h4>
                                </div>
                                <div class="card-body">
                                    {{-- {{ $totalPegawai }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.pegawai.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Kelas</h4>
                                </div>
                                <div class="card-body">
                                    {{-- {{ $totalPegawai }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.jabatan.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Kepala Sekolah</h4>
                                </div>
                                <div class="card-body">
                                    {{-- {{ $totalJabatan }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.duk.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-sort-numeric-up"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Guru BK</h4>
                                </div>
                                <div class="card-body">
                                    {{-- {{ $totalDuk }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('admin.duk.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-sort-numeric-up"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Jurusan</h4>
                                </div>
                                <div class="card-body">
                                    {{-- {{ $totalDuk }} --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        // Fungsi untuk menampilkan jam waktu nyata
        function updateJam() {
            var now = new Date();
            var jam = now.getHours();
            var menit = now.getMinutes();
            var detik = now.getSeconds();
            var tanggal = now.toLocaleDateString(); // Tanggal

            // Format jam dengan menambahkan 0 di depan jika kurang dari 10
            jam = (jam < 10) ? "0" + jam : jam;
            menit = (menit < 10) ? "0" + menit : menit;
            detik = (detik < 10) ? "0" + detik : detik;

            // Tampilkan jam di dalam elemen dengan ID 'jam'
            document.getElementById('jam').innerHTML = jam + ":" + menit + ":" + detik + " - " +
                tanggal; // Tanggal

            // Set interval untuk memperbarui setiap detik
            setTimeout(updateJam, 1000);
        }

        // Panggil fungsi saat halaman dimuat
        updateJam();
    </script>

    {{-- <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        @if ($genderData['laki_laki'] || $genderData['perempuan'])
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Laki-Laki', 'Perempuan'],
                    datasets: [{
                        data: [{{ $genderData['laki_laki'] }}, {{ $genderData['perempuan'] }}],
                        backgroundColor: ['#6777ef', '#e74c3c'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        position: 'bottom'
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Pegawai Berdasarkan Jenis Kelamin'
                    }
                }
            });
        @endif
    </script> --}}
@endpush
