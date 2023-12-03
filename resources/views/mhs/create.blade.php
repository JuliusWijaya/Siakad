@extends('layouts.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card mt-5">
                <h5 class="card-title text-center mt-3 mb-0">Add Mahasiswa</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nim">NIM</label>
                                <input 
                                  type="number" 
                                  name="nim" 
                                  id="nim" 
                                  class="form-control @error('nim') is-invalid @enderror" 
                                  value="{{ old('nim') }}"
                                  placeholder="Masukan Nim"
                                >
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">NAMA</label>
                                <input 
                                 type="text" 
                                 name="nama_mhs" 
                                 id="nama_mhs" 
                                 class="form-control @error('nama_mhs') is-invalid @enderror"
                                 value="{{ old('nama_mhs') }}" 
                                 placeholder="Masukan Nama Lengkap"
                                >
                                @error('nama_mhs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="kelas_id">KELAS</label>
                                <select name="kelas_id" id="kelas_id" class="form-control kelas @error('kelas_id') is-invalid @enderror">
                                    <option>-- Pilih Kelas --</option>
                                    @foreach($kelas as $item)
                                    <option value="{{ $item->id }}" @selected(old('kelas_id') == $item->id)>
                                        {{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="jurusan_id">JURUSAN</label>
                                <select class="form-control @error('jurusan_id') is-invalid @enderror" name="jurusan_id" id="jurusan_id">
                                    <option>-- Pilih Jurusan --</option>
                                    @foreach($jurusans as $jurusan)
                                        @if (old('jurusan_id') == $jurusan->id)
                                        <option value="{{ $jurusan->id }}" selected>
                                            {{ $jurusan->nama_jurusan }}
                                        </option>
                                        @else
                                        <option value="{{ $jurusan->id }}">
                                            {{ $jurusan->nama_jurusan }}
                                        </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('jurusan_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jk">JENIS KELAMIN</label>
                                <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror"> 
                                    <option>-- Pilih JK --</option>
                                    <option value="Laki-laki" @selected(old('jk')=='Laki-laki' )>Laki-laki</option>
                                    <option value="Perempuan" @selected(old('jk')=='Perempuan' )>Perempuan</option>
                                </select>
                                @error('jk')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="no_hp">NO HP</label>
                                <input 
                                 type="number" 
                                 class="form-control @error('no_hp') is-invalid @enderror" 
                                 id="no_hp"
                                 name="no_hp" 
                                 value="{{ old('no_hp') }}" 
                                 placeholder="Masukan No Handphone"
                                >
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="dosen_id" class="form-label">DOSEN</label>
                                <select class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_id"
                                    id="dosen_id" aria-describedby="validationServer04Feedback">
                                    <option>-- Pilih Dosen --</option>
                                    @foreach($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" @selected(old('dosen_id') == $dosen->id)>
                                        {{ $dosen->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('dosen_id')
                                <div class="invalid-feedback" id="validationServer04Feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ormawa_id">ORMAWA</label>
                                <select class="form-control @error('ormawa_id') is-invalid @enderror ormawas"
                                    name="ormawa_id[]" id="ormawa_id" multiple="multiple">
                                    <option>-- Pilih Ormawa --</option>
                                    @foreach($ormawas as $ormawa)
                                    <option value="{{ $ormawa->id }}" @selected(old('ormawa_id')==$ormawa->id)>
                                        {{ $ormawa->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('ormawa_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="alamat">ALAMAT</label>
                            <input 
                             type="text" 
                             class="form-control @error('alamat') is-invalid @enderror" 
                             id="alamat"
                             name="alamat" 
                             value="{{ old('alamat') }}" 
                             placeholder="Masukan Alamat"
                            >
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="modal-footer mb-0">
                            <button class="btn btn-primary me-2" type="submit">Save</button>
                            <a href="/admin/students" class="btn btn-secondary">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.kelas').select2();
    });

    $(document).ready(function () {
        $('.ormawas').select2();
    });

</script>
@endsection
