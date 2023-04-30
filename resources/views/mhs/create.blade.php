@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6" style="margin: 0 auto;">
            <div class="card mt-5">
                <h5 class="card-title text-center mt-2 mb-0">Add Mahasiswa</h5>
                <div class="card-body">
                    <form method="POST" action="/mahasiswa">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-0">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                                    value="{{ old('nim') }}" placeholder="Masukan Nim">
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label for="nama_mhs">NAMA</label>
                                <input type="text" class="form-control @error('nama_mhs') is-invalid @enderror" id="nama_mhs"
                                    name="nama_mhs" value="{{ old('nama_mhs') }}" placeholder="Masukan Nama Lengkap">
                                @error('nama_mhs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label for="jk">JENIS KELAMIN</label>
                                <select class="form-control" name="jk" id="jk">
                                    <option>-- Pilih JK --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label for="jurusan">JURUSAN</label>
                                <select class="form-control" name="jurusan" id="jurusan">
                                    <option>-- Pilih Jurusan --</option>
                                    @foreach ($jurusans as $jurusan)
                                    @if (old('jurusan') == $jurusan->id_jurusan)
                                    <option value="{{ $jurusan->id_jurusan }}" selected>{{ $jurusan->id_jurusan }}</option>
                                    @else
                                    <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->id_jurusan }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('jurusan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label for="no_hp">NO HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                    name="no_hp" value="{{ old('no_hp') }}" placeholder="Masukan No Handphone">
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <label for="alamat">ALAMAT</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    name="alamat" value="{{ old('alamat') }}" placeholder="Masukan Alamat">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label for="dosen_id">DOSEN</label>
                                <select class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_id" id="dosen_id">
                                    <option>-- Pilih Dosen --</option>
                                    @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" @selected(old('dosen_id') == $dosen->id)>
                                        {{ $dosen->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer mb-0">
                            <a href="/mahasiswa" class="btn btn-secondary">Close</a>
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection