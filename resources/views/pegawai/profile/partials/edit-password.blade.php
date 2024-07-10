<div class="col-12 col-md-12 col-lg-6">
    <div class="card">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')
            <div class="card-header">
                <h4>Ubah Kata Sandi</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="current_password">Kata Sandi Saat Ini</label>
                        <input id="current_password" name="current_password" type="password"
                            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                            placeholder="Masukkan kata sandi saat ini">
                        @error('current_password', 'updatePassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="password">Kata Sandi Baru</label>
                        <input id="password" type="password" name="password"
                            class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                            placeholder="Masukkan kata sandi baru">
                        @error('password', 'updatePassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-10">
                        <label for="password_confirmation">Konfirmasi Kata Sandi Baru</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                            placeholder="Masukkan konfirmasi kata sandi">
                        @error('password_confirmation', 'updatePassword')
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
