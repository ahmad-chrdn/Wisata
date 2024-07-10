<div class="col-12 col-md-12 col-lg-6">
    <div class="card">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-header">
                <h4 class="text-dark">Ubah Profil</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class=" form-group col-md-7">
                        <img src="{{ asset('storage/foto/' . $user->foto) }}" alt="Foto Admin"
                            style="width: 100px; height: 100px;" class="shadow-light rounded-circle mb-2">
                        <input type="file" id="foto" name="foto" accept="image/*"
                            class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $user->nama }}" readonly>
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
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>
</div>
