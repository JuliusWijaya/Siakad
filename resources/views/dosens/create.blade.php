@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6" style="margin: 0 auto;">
            <div class="card mt-5">
                <h5 class="card-title text-center mb-0 mt-2">Add Dosen</h5>
                <div class="card-body">
                    <form method="POST" action="/dosen">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nid">NIDN</label>
                                <input type="text" class="form-control @error('nid') is-invalid @enderror" id="nid"
                                name="nid" value="{{ old('nid') }}" placeholder="Masukan Nama Lengkap" required autofocus>
                                @error('nid')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" value="{{ old('nama') }}" placeholder="Masukan Nama Lengkap" required>
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">TGL LAHIR</label>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                name="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="Masukan Umur">
                                @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">ALAMAT</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    name="alamat" value="{{ old('alamat') }}" placeholder="Masukan alamat">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/dosen" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection