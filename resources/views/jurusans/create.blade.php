@extends('layouts.index')

@section('title', 'Add Biodata')

@section('content')
<form method="POST" action="/dashboard/biodata">
    @csrf
    <div class="modal-body">
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" value="{{ old('nik') }}">
            @error('nik')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nama">NAMA</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">ALAMAT</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}">
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group ">
            <label for="agama">AGAMA</label>
            <input type="text" class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama" value="{{ old('agama') }}">
            @error('agama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save</button>
    </div>
</form>
@endsection