@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin: 50px auto;">
            <div class="card">
                <h3 class="card-title text-center mt-2">{{ $title }}</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('wali.update', $wali->id) }}" class="d-inline">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-0">
                            <label for="id_jurusan">ID MHS</label>
                            <select class="form-control @error('mahasiswa_id') is-invalid @enderror" name="mahasiswa_id" id="mahasiswa_id">
                                <option>-- Pilih MHS --</option>
                                @foreach ($mahasiswa as $mhs)
                                <option value="{{ $mhs->id }}"
                                     @selected(old('mahasiswa_id', $wali->mahasiswa_id) == $mhs->id)>
                                     {{ $mhs->nama_mhs }}
                                </option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama_wali">NAMA WALI</label>
                            <input type="text" class="form-control  @error('nama_wali') is-invalid @enderror"
                                id="nama_wali" name="nama_wali" value="{{ old('nama_wali',  $wali->nama_wali) }}">
                            @error('nama_wali')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="umur">UMUR</label>
                            <input type="text" class="form-control  @error('umur') is-invalid @enderror" id="umur"
                            name="umur" value="{{ old('umur', $wali->umur) }}">
                            @error('umur')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="pekerjaan">JURUSAN</label>
                            <input type="text" class="form-control  @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                            name="pekerjaan" value="{{ old('pekerjaan',  $wali->pekerjaan) }}">
                            @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    
                        <button class="btn btn-primary mt-2">Update</button>
                        <a href="/wali" class="btn btn-secondary mt-2 ml-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
