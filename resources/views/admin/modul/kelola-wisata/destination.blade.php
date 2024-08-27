@extends('layouts.app')

@section('title', 'Data Destinasi Wisata')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/izitoast/dist/css/iziToast.min.css') }}">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            width: 100%;
            height: 400px;
        }

        /* CSS untuk menggulir hasil pencarian */
        .leaflet-control-geocoder-alternatives {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Destinasi Wisata</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active"><a href="#">Kelola Destinasi Wisata</a></div>
                    <div class="breadcrumb-item">Data Destinasi Wisata</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Destinasi Wisata</h2>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addDestination">
                                    <i class="fa fa-plus"></i> Tambah Destinasi Wisata
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Kategori</th>
                                                <th>Nama Destinasi</th>
                                                <th>Keterangan</th>
                                                <th>Gambar</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($destinations as $destination)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $destination->kategori->nm_kategori }}</td>
                                                    <td>{{ $destination->nm_wisata }}</td>
                                                    <td>{{ $destination->keterangan }}</td>
                                                    <td>
                                                        @if ($destination->gambar)
                                                            <img src="{{ asset('storage/' . $destination->gambar) }}"
                                                                alt="Foto" style="width: 50px; height: 50px;"
                                                                class="shadow-light rounded-circle">
                                                        @else
                                                            Tidak ada gambar
                                                        @endif
                                                    </td>
                                                    <td>{{ $destination->latitude }}</td>
                                                    <td>{{ $destination->longitude }}</td>
                                                    <td>
                                                        <form method="POST"
                                                            action="{{ route('admin.kelola-wisata.destination.destroy', $destination->id) }}">
                                                            <a class="btn btn-success btn-sm" href="#"
                                                                data-toggle="modal"
                                                                data-target="#editDestination{{ $destination->id }}">Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                role="button">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal Tambah Destinasi Wisata -->
    <div class="modal fade" id="addDestination" tabindex="-1" role="dialog" aria-labelledby="addDestinationLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDestinationLabel">Tambah Destinasi Wisata</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulir untuk menambahkan data destinasi wisata -->
                    <form method="post" action="{{ route('admin.kelola-wisata.destination.store') }}"
                        enctype="multipart/form-data" class="needs-validation" novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select id="kategori_id" name="kategori_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nm_kategori }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Kategori wajib dipilih.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nm_wisata">Nama Destinasi</label>
                            <input type="text" id="nm_wisata" name="nm_wisata" class="form-control"
                                placeholder="Masukkan Nama Wisata" required>
                            <div class="invalid-feedback">
                                Nama wisata wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="form-control" placeholder="Masukkan Keterangan"></textarea>
                            <div class="invalid-feedback">
                                Keterangan wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                                accept="image/*">
                            @error('gambar')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                            <small id="emailHelp" class="form-text text-muted">Gambar opsional, dapat diisi jika
                                ada.</small>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude" class="form-control"
                                placeholder="Masukkan Latitude" required>
                            <div class="invalid-feedback">
                                Latitude wajib diisi.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude" class="form-control"
                                placeholder="Masukkan Longitude" required>
                            <div class="invalid-feedback">
                                Longitude wajib diisi.
                            </div>
                        </div>

                        <!-- Leaflet Map -->
                        <div class="form-group">
                            <label for="map">Pilih Lokasi di Peta</label>
                            <div id="map-add" style="height: 300px;"></div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Destinasi Wisata -->
    @foreach ($destinations as $destination)
        <div class="modal fade" id="editDestination{{ $destination->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editDestinationLabel{{ $destination->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDestinationLabel{{ $destination->id }}">Edit Destinasi Wisata
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulir untuk mengedit data destinasi wisata -->
                        <form method="post"
                            action="{{ route('admin.kelola-wisata.destination.update', $destination->id) }}"
                            enctype="multipart/form-data" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kategori_id{{ $destination->id }}">Kategori</label>
                                <select id="kategori_id{{ $destination->id }}" name="kategori_id" class="form-control"
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $destination->kategori_id ? 'selected' : '' }}>
                                            {{ $category->nm_kategori }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Kategori wajib dipilih.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nm_wisata{{ $destination->id }}">Nama Destinasi</label>
                                <input type="text" id="nm_wisata{{ $destination->id }}" name="nm_wisata"
                                    class="form-control" value="{{ $destination->nm_wisata }}" required>
                                <div class="invalid-feedback">
                                    Nama wisata wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan{{ $destination->id }}">Keterangan</label>
                                <textarea id="keterangan{{ $destination->id }}" name="keterangan" class="form-control" required>{{ $destination->keterangan }}</textarea>
                                <div class="invalid-feedback">
                                    Keterangan wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        @if ($destination->gambar)
                                            <img src="{{ asset('storage/' . $destination->gambar) }}" alt="Gambar"
                                                style="width: 400px; height: auto" class="img-thumbnail">
                                        @endif
                                        <input type="file" id="gambar" name="gambar" accept="image/*"
                                            class="form-control @error('gambar') is-invalid @enderror">
                                        @error('gambar')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="latitude{{ $destination->id }}">Latitude</label>
                                <input type="text" id="latitude{{ $destination->id }}" name="latitude"
                                    class="form-control" value="{{ $destination->latitude }}" required>
                                <div class="invalid-feedback">
                                    Latitude wajib diisi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="longitude{{ $destination->id }}">Longitude</label>
                                <input type="text" id="longitude{{ $destination->id }}" name="longitude"
                                    class="form-control" value="{{ $destination->longitude }}" required>
                                <div class="invalid-feedback">
                                    Longitude wajib diisi.
                                </div>
                            </div>

                            <!-- Leaflet Map -->
                            <div class="form-group">
                                <label for="map">Pilih Lokasi di Peta</label>
                                <div id="map-edit-{{ $destination->id }}" style="height: 300px;"></div>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('library/izitoast/dist/js/iziToast.min.js') }}"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Leaflet Geocoder Plugin -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        // Fungsi untuk mengambil nama depan dari hasil Reverse Geocoding
        function getFirstName(fullName) {
            return fullName.split(',')[0];
        }

        // Fungsi Reverse Geocoding
        function reverseGeocode(lat, lng, callback) {
            var url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    if (data && data.display_name) {
                        callback(data);
                    }
                })
                .catch(err => console.error(err));
        }

        // Inisialisasi peta untuk form tambah
        $('#addDestination').on('shown.bs.modal', function() {
            var mapAdd = L.map('map-add').setView([-0.026, 109.342], 13); // Koordinat Pontianak
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mapAdd);

            var markerAdd = L.marker([-0.026, 109.342], {
                    draggable: true
                }).addTo(mapAdd)
                .bindPopup('Geser untuk memilih lokasi!')
                .openPopup();

            markerAdd.on('dragend', function(e) {
                var latlng = markerAdd.getLatLng();
                document.getElementById('latitude').value = latlng.lat;
                document.getElementById('longitude').value = latlng.lng;

                // Reverse Geocode untuk mendapatkan nama lokasi
                reverseGeocode(latlng.lat, latlng.lng, function(data) {
                    var firstName = getFirstName(data.display_name);
                    document.getElementById('nm_wisata').value = firstName;
                    document.getElementById('keterangan').value = data.display_name;
                });
            });

            // Tambahkan geocoder ke peta
            L.Control.geocoder({
                defaultMarkGeocode: false
            }).on('markgeocode', function(e) {
                var latlng = e.geocode.center;
                mapAdd.setView(latlng, 13);
                markerAdd.setLatLng(latlng);
                document.getElementById('latitude').value = latlng.lat;
                document.getElementById('longitude').value = latlng.lng;

                // Reverse Geocode untuk mendapatkan nama lokasi
                reverseGeocode(latlng.lat, latlng.lng, function(data) {
                    var firstName = getFirstName(data.display_name);
                    document.getElementById('nm_wisata').value = firstName;
                    document.getElementById('keterangan').value = data.display_name;
                });
            }).addTo(mapAdd);
        });

        // Inisialisasi peta di dalam modal edit ketika dibuka
        @foreach ($destinations as $destination)
            $('#editDestination{{ $destination->id }}').on('shown.bs.modal', function() {
                var mapEdit = L.map('map-edit-{{ $destination->id }}').setView([{{ $destination->latitude }},
                    {{ $destination->longitude }}
                ], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(mapEdit);

                var markerEdit = L.marker([{{ $destination->latitude }}, {{ $destination->longitude }}], {
                        draggable: true
                    }).addTo(mapEdit)
                    .bindPopup('Geser untuk memilih lokasi!')
                    .openPopup();

                markerEdit.on('dragend', function(e) {
                    var latlng = markerEdit.getLatLng();
                    document.getElementById('latitude{{ $destination->id }}').value = latlng.lat;
                    document.getElementById('longitude{{ $destination->id }}').value = latlng.lng;

                    reverseGeocode(latlng.lat, latlng.lng, function(data) {
                        var firstName = getFirstName(data.display_name);
                        document.getElementById('nm_wisata{{ $destination->id }}').value =
                            firstName;
                        document.getElementById('keterangan{{ $destination->id }}').value = data
                            .display_name;
                    });
                });

                L.Control.geocoder({
                    defaultMarkGeocode: false
                }).on('markgeocode', function(e) {
                    var latlng = e.geocode.center;
                    mapEdit.setView(latlng, 13);
                    markerEdit.setLatLng(latlng);
                    document.getElementById('latitude{{ $destination->id }}').value = latlng.lat;
                    document.getElementById('longitude{{ $destination->id }}').value = latlng.lng;

                    reverseGeocode(latlng.lat, latlng.lng, function(data) {
                        var firstName = getFirstName(data.display_name);
                        document.getElementById('nm_wisata{{ $destination->id }}').value =
                            firstName;
                        document.getElementById('keterangan{{ $destination->id }}').value = data
                            .display_name;
                    });
                }).addTo(mapEdit);
            });
        @endforeach
    </script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

    <script>
        @if (session()->has('success'))
            iziToast.success({
                title: 'BERHASIL!',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @elseif ($errors->any())
            iziToast.error({
                title: 'GAGAL!',
                message: 'Terjadi kesalahan pada input data.',
                position: 'topCenter'
            });
        @endif
    </script>
@endpush
