@extends('layouts.main')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin: 50px auto;">
            <div class="card">
                <h3 class="card-title text-center mt-2">Edit {{ $student->nama_mhs }}</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('students.update', $student->id) }}" class="d-inline">
                        @csrf
                        @method('patch')
                        <div class="form-group mb-0">
                            <label for="nim">NIM</label>
                            <input 
                             type="text" 
                             class="form-control @error('nim') is-invalid @enderror" 
                             id="nim"
                             name="nim" 
                             value="{{ old('nim', $student->nim) }}"
                            >
                            @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-0 mt-2">
                            <label for="nama_mhs">NAMA</label>
                            <input 
                             type="text" 
                             class="form-control  @error('nama_mhs') is-invalid @enderror"
                             id="nama_mhs" 
                             name="nama_mhs" 
                             value="{{ old('nama_mhs', $student->nama_mhs) }}"
                            >
                            @error('nama_mhs')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-2 mt-2">
                            <label for="kelas_id">KELAS</label>
                            <select class="form-control" name="kelas_id" id="kelas_id">
                                <option>-- Pilih Kelas --</option>
                                @foreach ($kelas as $kls)
                                <option value="{{ $kls->id }}" @selected(old('kelas_id', $student->kelas_id == $kls->id))>
                                    {{  $kls->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <label for="jk">JK</label>
                            <select class="form-control" name="jk" id="jk">
                                <option value="{{ $student->jk }}" @selected(old('jk', $student->jk == $student->id))>
                                    {{$student->jk}}
                                </option>
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            </select>
                        </div>

                        <div class="form-group mb-0 mt-2">
                            <label for="jurusan_id">JURUSAN</label>
                            <select class="form-control" name="jurusan_id" id="jurusan_id">
                                <option>-- Pilih Jurusan --</option>
                                @foreach ($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}" 
                                        @selected(old('jurusan_id', $student->jurusan_id) == $jurusan->id)
                                    >
                                        {{ $jurusan->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jurusan_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-0 mt-2">
                            <label for="no_hp">NO HP</label>
                            <input 
                             type="text" 
                             class="form-control  @error('no_hp') is-invalid @enderror" 
                             id="no_hp"
                             name="no_hp" 
                             value="{{ old('no_hp', $student->no_hp) }}"
                            >
                            @error('no_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-0 mt-2">
                            <label for="alamat">ALAMAT</label>
                            <input 
                             type="text" 
                             class="form-control  @error('alamat') is-invalid @enderror" 
                             id="alamat"
                             name="alamat" 
                             value="{{ old('alamat', $student->alamat) }}"
                            >
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        
                        <ol class="list-group list-group-numbered mb-3 mt-2">
                            @foreach ($student->ormawa as $item)
                                <li class="list-group-item">
                                    {{ $item->name }}
                                </li>
                            @endforeach
                        </ol>

                        <div class="form-group ">
                            <label for="ormawa_id">ORMAWA</label>
                            <select class="form-control @error('ormawa_id') is-invalid @enderror ormawas"
                             name="ormawa_id[]" id="ormawa_id" multiple="multiple">
                                <option>-- Pilih Ormawa --</option>
                                @foreach ($ormawas as $ormawa)
                                <option value="{{ $ormawa->id }}">
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
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                        <a href="/admin/student/{{ $student->slug }}/details" class="btn btn-secondary mt-2 ml-2">Back</a>
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
<script>
    $(document).ready(function () {
        $('.ormawas').select2();
    });
</script>
@endsection
