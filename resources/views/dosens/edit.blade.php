@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin: 50px auto;">
            <div class="card">
                <h3 class="card-title text-center mt-2">{{ $title }}</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('dosen.update', $dosen->id) }}" class="d-inline">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-0">
                            <label for="nid">ID MHS</label>
                            <input type="text" class="form-control  @error('nid') is-invalid @enderror"
                                id="nid" name="nid" value="{{ old('nid',  $dosen->nid) }}">
                            @error('nid')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="nama">NAMA</label>
                            <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                id="nama" name="nama" value="{{ old('nama',  $dosen->nama) }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="tgl_lahir">TGL LAHIR</label>
                            <input type="date" class="form-control  @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                            name="tgl_lahir" value="{{ old('tgl_lahir', $dosen->tgl_lahir) }}">
                            @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label for="alamat">ALAMAT</label>
                            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" value="{{ old('alamat',  $dosen->alamat) }}">
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    
                        <button class="btn btn-primary mt-2">Update</button>
                        <a href="/dosen" class="btn btn-secondary mt-2 ml-2">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.form-control').datetimepicker({
            locale: 'id',
        });
    });
</script>
@endsection
