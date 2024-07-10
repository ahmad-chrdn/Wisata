@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Daftar</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                        name="nama" placeholder="Masukkan nama">
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="Masukkan email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Kata Sandi</label>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Masukkan kata sandi">
                        <div class="input-group-append">
                            <span class="input-group-text show-hide-password" id="toggle-password" style="cursor: pointer;">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="control-label">Konfirmasi Kata Sandi</label>
                    <div class="input-group">
                        <input id="password_confirmation" type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation" placeholder="Masukkan konfirmasi kata sandi">
                        <div class="input-group-append">
                            <span class="input-group-text show-hide-password" id="toggle-confirm-password"
                                style="cursor: pointer;">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Sudah memiliki akun? <a href="{{ route('login') }}">Login</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Show/hide password
            $(".show-hide-password").click(function() {
                var passwordInput = $(this).closest('.input-group').find('input');
                var passwordFieldType = passwordInput.attr('type');

                // Mengganti ikon mata pada saat toggle
                var eyeIcon = $(this).find('i');
                eyeIcon.toggleClass('fa-eye fa-eye-slash');

                // Toggle jenis input antara password dan text
                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                } else {
                    passwordInput.attr('type', 'password');
                }
            });
        });
    </script>
@endpush
