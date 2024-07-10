@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <!-- Info Boxes -->
    <div class="info-boxes">
        <div class="info-box">
            <div class="icon">
                <i class="fas fa-thermometer-half"></i>
            </div>
            <span>Suhu</span>
        </div>
        <div class="info-box">
            <div class="icon">
                <i class="fas fa-water"></i>
            </div>
            <span>TDS</span>
        </div>
        <div class="info-box">
            <div class="icon">
                <i class="fas fa-vial"></i>
            </div>
            <span>PH</span>
        </div>
    </div>

    <!-- Info Button -->
    <div class="info-button">
        <button id="info-toggle" class="btn-info">
            <i class="fas fa-info-circle"></i> Info
        </button>
    </div>

    <!-- Info Container -->
    <div class="info-container">
        <p>
            <i class="fas fa-info-circle"></i> Suhu ideal 26-31 °C
        </p>
        <p>
            <i class="fas fa-info-circle"></i> TDS Optimal 7,5 NTU
        </p>
        <p><i class="fas fa-info-circle"></i> pH Stabil 6,8-7,5</p>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
