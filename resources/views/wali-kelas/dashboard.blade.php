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
                            <p class="lead">Selamat Datang, di Website Kehadiran SMK NEGERI 01 SEMPARUK SAMBAS.</p>
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
                            <img src="{{ asset('img/SMK.png') }}" alt="Logo" class="logo-image"
                                style="display: block; margin: auto; width: 250px; height: auto;">
                            <br>
                            <p style="text-align: justify;">
                                SMKN 1 Semparuk adalah sebuah institusi pendidikan SMK negeri yang berlokasi di Jl.
                                Pendidikan, Kab. Sambas.
                                SMK negeri ini mengawali perjalanannya pada tahun 2007. Pada waktu ini SMK Negeri 1 Semparuk
                                memakai panduan kurikulum belajar SMK 2013 REV. Agribisnis Pengolahan Hasil Pertanian. SMKN
                                1 Semparuk dibawah kepemimpinan seorang kepala sekolah yang bernama Indro Wiretno dan
                                operator sekolah Eko Nuryanto. Sp.
                                Akreditasi SMKN 1 Semparuk
                                SMKN 1 Semparuk terakreditasi grade B dengan nilai 82 (akreditasi tahun 2019) dari BAN-S/M
                                (Badan Akreditasi Nasional) Sekolah/Madrasah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Siswa</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalSiswa }}
                            </div>
                        </div>
                    </div>
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-school"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kelas</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalKelas }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Siswa Bermasalah</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalMasalah }}
                            </div>
                        </div>
                    </div>
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-book-open"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Jurusan</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalJurusan }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
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
            document.getElementById('jam').innerHTML = jam + ":" + menit + ":" + detik + " - " + tanggal; // Tanggal

            // Set interval untuk memperbarui setiap detik
            setTimeout(updateJam, 1000);
        }

        // Panggil fungsi saat halaman dimuat
        updateJam();
    </script>
@endpush
