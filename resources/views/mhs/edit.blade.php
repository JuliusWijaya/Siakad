@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin: 50px auto;">
            <div class="card">
                <h3 class="card-title text-center mt-2">{{ $title }}</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" class="d-inline">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-0">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                name="nim" value="{{ old('nim',  $mahasiswa->nim) }}">
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama_mhs">NAMA</label>
                            <input type="text" class="form-control  @error('nama_mhs') is-invalid @enderror"
                                id="nama_mhs" name="nama_mhs" value="{{ old('nama_mhs',  $mahasiswa->nama_mhs) }}">
                            @error('nama_mhs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="jk">JK</label>
                            <select class="form-control" name="jk" id="jk">
                                <option value="{{ $mahasiswa->jk }}" @selected(old('jk', $mahasiswa->jk) ==
                                    $mahasiswa->id)>
                                    {{$mahasiswa->jk}}
                                </option>
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label for="jurusan">JURUSAN</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option>-- Pilih Jurusan --</option>
                                @foreach ($jurusans as $jurusan)
                                <option value="{{ $jurusan->id_jurusan }}" 
                                  @selected(old('jurusan', $mahasiswa->jurusan) == $jurusan->id_jurusan)>
                                    {{ $jurusan->id_jurusan }}
                                </option>
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
                            <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp"
                                name="no_hp" value="{{ old('no_hp',  $mahasiswa->no_hp) }}">
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="alamat">ALAMAT</label>
                            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat" value="{{ old('alamat',  $mahasiswa->alamat) }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="dosen_id">DOSEN</label>
                            <select class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_id" id="dosen_id">
                                <option>-- Pilih Dosen --</option>
                                @foreach ($dosens as $dosen)
                                @if (old('dosen_id', $mahasiswa->dosen_id) == $dosen->id)
                                <option value="{{ $dosen->id }}" selected>
                                    {{ $dosen->nama }}
                                </option>
                                @else
                                <option value="{{ $dosen->id }}">{{ $dosen->nama }}</option>
                                @endif
                                @endforeach
                            </select>
                            @error('dosen_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary mt-2">Update</button>
                        <a href="/mahasiswa" class="btn btn-secondary mt-2 ml-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
