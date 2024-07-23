@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profil</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hai, {{ auth()->user()->nama }}</h2>
                <p class="section-lead">
                    Ubah informasi tentang diri Anda di halaman ini.
                </p>

                <div class="row mt-sm-4">
                    @include('guru-bk.profile.partials.edit-profile')
                    @include('guru-bk.profile.partials.edit-password')
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    <script>
        // Message with toastr
        @if (session()->has('success'))
            iziToast.success({
                title: 'BERHASIL!',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @endif
    </script>

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
