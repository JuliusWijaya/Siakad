@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6" style="margin: 0 auto;">
                <div class="card">
                    <h4 class="card-title mt-2 text-center">{{ $title }}</h4>
                    <div class="card-body">
                        <form>
                            <fieldset disabled>
                                <div class="form-group">
                                    <label for="disabledTextInput"><b>NID :</b> </label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->nid }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput"><b>NAMA :</b></label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput"><b>TGL LAHIR :</b></label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->tgl_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput"><b>ALAMAT :</b></label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput"><b>MAHASISWA :</b></label>
                                    @foreach ($dosen->mahasiswa as $item)
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $item->nama_mhs }}">
                                    @endforeach
                                </div>
                            </fieldset>
                        </form>
                        <a href="/dosen">
                            <span class="badge badge-primary mr-2">
                                <i class="fa-solid fa-arrow-left"></i>
                            </span>
                        </a>
                        <a href="/dosen/{{ $dosen->id }}/edit" class="badge badge-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/dosen/{{ $dosen->id }}" method="POST" class="d-inline ml-2">
                            @method('delete')
                            @csrf
                            <button class="badge badge-danger border-0"
                                onclick="return confirm('Apakah Dosen {{ $dosen->nama }} Akan Dihapus ?')">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection