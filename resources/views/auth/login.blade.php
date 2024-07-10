@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email anda">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="control-label">Kata Sandi</label>
                    <div class="float-right">
                        <a href="{{ route('password.request') }}" class="text-small">
                            Lupa Kata Sandi?
                        </a>
                    </div>
                    <div class="input-group">
                        <input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata sandi">
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
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                        <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    {{-- <div class="mt-5 text-muted text-center">
        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
    </div> --}}
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

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
