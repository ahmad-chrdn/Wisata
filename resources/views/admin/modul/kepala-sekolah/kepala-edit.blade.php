@extends('layouts.app')

@section('title', 'Edit Kepala Sekolah')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kepala Sekolah</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Kepala Sekolah</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Kepala Sekolah</h2>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('admin.kepala-sekolah.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data" class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" id="nip" name="nip"
                                            value="{{ old('nip', $user->nip) }}"
                                            class="form-control @error('nip') is-invalid @enderror"
                                            placeholder="Masukkan NIP" required autofocus>
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" name="nama"
                                            value="{{ old('nama', $user->nama) }}"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Masukkan nama">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email"
                                            value="{{ old('email', $user->email) }}"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukkan email">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img src="{{ asset('storage/foto/' . $user->foto) }}" alt="Foto"
                                                    style="width: 100px; height: 100px;"
                                                    class="shadow-light rounded-circle mb-2">
                                                <input type="file" id="foto" name="foto" accept="image/*"
                                                    class="form-control @error('foto') is-invalid @enderror">
                                                @error('foto')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <input type="text" id="status" name="status"
                                            value="{{ old('status', $user->status) }}"
                                            class="form-control @error('status') is-invalid @enderror"
                                            placeholder="Masukkan status">
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('admin.kepala-sekolah.edit', $user->id) }}"
                                        class="btn btn-warning">Reset</a>
                                    <a href="{{ route('admin.kepala-sekolah.index') }}" class="btn btn-success">Kembali</a>
                                </form>
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

    <!-- Page Specific JS File -->
@endpush
