@extends('layouts.main')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/jurusan">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_jurusan">ID JURUSAN</label>
                        <input type="text" class="form-control @error('id_jurusan') is-invalid @enderror"
                            name="id_jurusan" id="id_jurusan" value="{{ old('id_jurusan') }}">
                        @error('id_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_jurusan">NAMA</label>
                        <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror"
                            name="nama_jurusan" id="nama_jurusan" value="{{ old('nama_jurusan') }}">
                        @error('nama_jurusan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<div class="col-sm-7" style="margin: 0 auto;">
    <div class="row mt-3">  
        @if (session()->has('success'))
            {{ session('success') }}
        @endif

        <div class="col-md-12">
            <h2 class="text-center pb-2">Form Jurusan</h2>
        </div>

        <div class="col-md-4">
            <!-- Form Pencarian -->
            <form method="GET" action="/jurusan">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control bi bi-search" value="{{ Request('search') }}" name="search"
                        placeholder="Masukan Pencarian">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Form Pencarian -->
        </div>

        <div class="text-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa-solid fa-graduation-cap"></i>
                <strong>Add</strong>
            </button>
            {{-- <a href="/biodata/add" class="btn btn-primary">Add</a>  --}}
        </div>

        @if($jurusans->count())
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th scope="col">ID JURUSAN</th>
                            <th scope="col">NAMA JURUSAN</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jurusans as $index => $data)
                        <tr>
                            <td class="text-center">{{ $index + $jurusans->firstItem() }}</td>
                            <td>{{ $data->id_jurusan }}</td>
                            <td>{{ $data->nama_jurusan }}</td>
                            <td class=" text-center">
                                <a href="/jurusan/{{ $data->slug }}/details" class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ada!
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="d-flex justify-content-start">
                        <a href="/jurusan/print" class="btn btn-success btn-sm ml-3" target="_blank">
                            <i class="fa-solid fa-print"></i>
                            Print
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="d-flex justify-content-end">
                        <a href="/jurusan/export" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-print"></i>
                            Export Excel
                        </a>
                    </div>     
                </div>
            </div>
        @else
            <p class="alert alert-danger text-center text-dark mt-5 col-md-5 text-white" style="margin: 0 auto">
                Not Found Jurusan
            </p>
        @endif
</div>
@endsection

