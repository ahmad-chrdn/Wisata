<div class="col-12 col-md-12 col-lg-6">
    <div class="card">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form method="post" action="{{ route('pegawai.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-header">
                <h4>Ubah Profil</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class=" form-group col-md-4">
                        <img alt="image" src="{{ $user->getProfilePictureUrlAttribute() }}"
                            class="rounded-circle profile-widget-picture"
                            style="max-width: 100px; height: auto;
                            margin-bottom: 15px;">
                        <input type="file" id="picture" name="picture" accept="image/*">
                        @error('picture')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip"
                            value="{{ $user->nip }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" placeholder="Masukkan Nama" value="{{ old('nama', $user->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Masukkan Email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
