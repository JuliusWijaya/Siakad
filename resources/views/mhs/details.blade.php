@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-6">
            <div class="card" style="width: 35rem;">
                <h5 class="card-title text-center mt-2">Detail Mahasiswa {{ $details->nama_mhs }}</h5>
                <div class="card-body">
                    <div class="mb-2">
                        <label for="nim" class="form-label">NIM :</label>
                        <input type="text" class="form-control" id="nim" value="{{ $details->nim }}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="nama" class="form-label">NAMA :</label>
                        <input type="text" class="form-control" id="nama" value="{{ $details->nama_mhs }}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="jk" class="form-label">JK :</label>
                        <input type="text" class="form-control" id="jk" value="{{ $details->jk }}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="jurusan" class="form-label">JURUSAN :</label>
                        <input type="text" class="form-control" id="jurusan" value="{{ $details->jurusan }}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="no_hp" class="form-label">NO HP :</label>
                        <input type="text" class="form-control" id="no_hp" value="{{ $details->no_hp }}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="form-label">ALAMAT :</label>
                        <input type="text" class="form-control" id="alamat" value="{{ $details->alamat }}" readonly>
                    </div>
                    <div class="mb-2">
                        <label for="dosen_id" class="form-label">DOSEN :</label>
                        <input type="text" class="form-control" id="dosen_id" value="{{ $details->dosen->nama }}" readonly>
                    </div>
                    <div>
                        <a href="/mahasiswa">
                          <span class="badge badge-secondary">
                            <i class="fa-solid fa-arrow-left"></i>  
                          </span> 
                        </a>
      
                        <a href="/mahasiswa/{{ $details->slug }}/edit" class="ml-2">
                          <span class="badge badge-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                          </span> 
                        </a>
      
                        <form action="/mahasiswa/{{$details->id}}" method="POST" class="d-inline ml-2">
                          @method('DELETE')
                          @csrf
                          <button class="badge badge-danger border-0"
                              onclick="return confirm('Serius Mahasiswa {{ $details->nama_mhs }} Akan Di Hapus ?')">
                              <i class="fa-regular fa-circle-xmark">
                              </i>
                          </button>
                      </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
