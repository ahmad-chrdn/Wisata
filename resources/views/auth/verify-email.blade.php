@extends('layouts.auth')

@section('title', 'Verifikasi Email')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Verifikasi Email</h4>
        </div>

        <div class="card-body">
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success" role="alert">
                    Tautan verifikasi baru telah dikirim ke alamat surel yang Anda berikan saat pendaftaran.
                </div>
            @endif

            <p class="text-muted">
                Terima kasih sudah mendaftar! Sebelum memulai, bisa kah Anda memverifikasi alamat surel dengan mengklik
                tautan yang kami kirim? Jika Anda tidak menerima surel, kami akan mengirim ulang.
            </p>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Kirim Ulang Surel Verifikasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
