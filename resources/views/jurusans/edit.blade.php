@extends('layouts.main')


@section('content')
<div class="col-md-5" style="margin: 0 auto;">
    <div class="card mt-5">
        <h5 class="card-title text-center mt-3">Edit Jurusan</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('jurusan.update', $jurusan->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="jurusan">ID JURUSAN</label>
                    <input 
                     type="text" 
                     class="form-control @error('jurusan') is-invalid @enderror" 
                     name="jurusan" 
                     id="jurusan"
                     value="{{$jurusan->jurusan}}"
                     required
                     autofocus
                    >
                    @error('jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama_jurusan">NAMA JURUSAN</label>
                    <input 
                     type="text" 
                     class="form-control @error('nama_jurusan') is-invalid @enderror" 
                     name="nama_jurusan" 
                     id="nama_jurusan"
                     value="{{$jurusan->nama_jurusan}}"
                     required
                    >
                    @error('nama_jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="/admin/jurusan" class="card-link">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
