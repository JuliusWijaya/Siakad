@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
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
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                                    name="slug" value="{{ old('slug') }}" placeholder="Slug Otomatis Terisi" required readonly>
                                @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">TGL LAHIR</label>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                name="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="Masukan Umur" required>
                                @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="alamat">ALAMAT</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    name="alamat" value="{{ old('alamat') }}" placeholder="Masukan alamat" required>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/dosen" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const nama = document.getElementById('nama');
    const slug = document.getElementById('slug');

    nama.addEventListener('change', function(){
        fetch('/dosen/create/checkSlug?nama=' + nama.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
</script>
@endsection