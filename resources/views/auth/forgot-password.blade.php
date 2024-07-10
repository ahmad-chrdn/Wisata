@extends('layouts.auth')

@section('title', 'Lupa Kata Sandi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Lupa Kata Sandi</h4>
        </div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <p class="text-muted">Kami akan mengirimkan tautan untuk mereset kata sandi Anda.</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
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

                <!-- Tombol Login dan OR Section -->
                <div class="row align-items-center">
                    <div class="col-5">
                        <div class="input-group mb-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Kirim
                            </button>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="font-16 weight-600 text-center" data-color="#707373" style="color: rgb(112, 115, 115);">
                            OR</div>
                    </div>
                    <div class="col-5">
                        <div class="input-group mb-0">
                            <a class="btn btn-outline-primary btn-lg btn-block" href="{{ route('login') }}">Login</a>
                        </div>
                    </div>
                </div>
                <!-- End Tombol Login dan OR Section -->
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
