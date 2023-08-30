@extends('layouts.main')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <div class="card mt-5">
            <h5 class="card-title text-center mb-0 mt-3">Edit Kelas {{ $kelas->name }}</h5>
            <div class="card-body">
                <form method="POST" action="">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">NAME KELAS</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $kelas->name) }}" placeholder="Masukan Nama Ormawa" required
                                autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah">JUMLAH SISWA</label>
                            <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                name="jumlah" id="jumlah" value="{{ old('jumlah', $kelas->jumlah) }}">
                            @error('jumlah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/kelas" class="btn btn-secondary me-3">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
