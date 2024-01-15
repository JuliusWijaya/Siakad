@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6" style="margin: 0 auto;">
                <div class="card">
                    <h4 class="card-title mt-2 text-center">Detail Dosen {{ $dosen->nama }}</h4>
                    <div class="card-body">
                        <form>
                            <fieldset disabled>
                                <div class="form-group">
                                    <label for="disabledTextInput">NID :</label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->nid }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">NAMA :</label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">TGL LAHIR :</label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->tgl_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">ALAMAT :</label>
                                    <input type="text" id="disabledInput" class="form-control" value="{{ $dosen->alamat }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">DOSEN PA :</label>
                                    <input type="text" id="disabledInput" class="form-control" 
                                    value="{{ $dosen->kelas['name'] }}">
                                </div>
                                <div class="form-group">
                                    <label for="disabledTextInput">MAHASISWA :</label>
                                    @forelse ($dosen->kelas->mahasiswa as $item)
                                    <ul class="list-group">
                                        <li class="list-group-item">- {{ $item->nama_mhs }}</li>
                                    </ul>
                                    @empty
                                    <ul class="list-group">
                                        <li class="list-group-item">-</li>
                                    </ul>       
                                    @endforelse
                                </div>
                            </fieldset>
                        </form>
                        <a href="/admin/dosen">
                            <span class="badge badge-primary mr-2">
                                <i class="fa-solid fa-arrow-left"></i>
                            </span>
                        </a>
                        <a href="/admin/dosen/edit/{{ $dosen->slug }}" class="badge badge-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        @if (!$dosen->kelas->mahasiswa->count())
                        <form action="{{ route('dosen.destroy', $dosen->id) }}" method="POST" class="d-inline ml-2">
                            @csrf
                            @method('delete')
                            <button class="badge badge-danger border-0"
                                onclick="return confirm('Apakah Dosen {{ $dosen->nama }} Akan Dihapus ?')">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </button>
                        </form>
                        @endif
                        <a href="/print/dosen/{{ $dosen->slug }}" class="badge badge-info ml-2" target="_blank">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection