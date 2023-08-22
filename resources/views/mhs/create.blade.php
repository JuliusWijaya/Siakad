@extends('layouts.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-lg-6" style="margin: 0 auto;">
            <div class="card mt-5">
                <h5 class="card-title text-center mt-2 mb-0">Add Mahasiswa</h5>
                <div class="card-body">
                    <form method="POST" action="/mahasiswa">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group mb-2">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim" value="{{ old('nim') }}" placeholder="Masukan Nim">
                                @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="nama_mhs">NAMA</label>
                                <input type="text" class="form-control @error('nama_mhs') is-invalid @enderror"
                                    id="nama_mhs" name="nama_mhs" value="{{ old('nama_mhs') }}"
                                    placeholder="Masukan Nama Lengkap">
                                @error('nama_mhs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="kelas_id">KELAS</label>
                                <select name="kelas_id" id="kelas_id" class="form-control kelas">
                                    <option value="" class="text-center">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
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
                            <div class="form-group mb-2">
                                <label for="jurusan">JURUSAN</label>
                                <select class="form-control" name="jurusan" id="jurusan">
                                    <option>-- Pilih Jurusan --</option>
                                    @foreach ($jurusans as $jurusan)
                                    @if (old('jurusan') == $jurusan->id_jurusan)
                                    <option value="{{ $jurusan->id_jurusan }}" selected>{{ $jurusan->id_jurusan }}
                                    </option>
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
                            <div class="form-group mb-2">
                                <label for="no_hp">NO HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                    name="no_hp" value="{{ old('no_hp') }}" placeholder="Masukan No Handphone">
                                @error('no_hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="alamat">ALAMAT</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Masukan Alamat">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="dosen_id">DOSEN</label>
                                <select class="form-control @error('dosen_id') is-invalid @enderror" name="dosen_id"
                                    id="dosen_id">
                                    <option>-- Pilih Dosen --</option>
                                    @foreach ($dosens as $dosen)
                                    <option value="{{ $dosen->id }}" @selected(old('dosen_id')==$dosen->id)>
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
                            <div class="form-group ">
                                <label for="ormawa_id">ORMAWA</label>
                                <select class="form-control @error('ormawa_id') is-invalid @enderror ormawas"
                                    name="ormawa_id[]" id="ormawa_id" multiple="multiple">
                                    <option>-- Pilih Ormawa --</option>
                                    @foreach ($ormawas as $ormawa)
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
