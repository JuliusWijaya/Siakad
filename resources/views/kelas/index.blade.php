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
            <form method="POST" action="{{ route('kelas.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">NAMA KELAS</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">JUMLAH SISWA</label>
                        <input type="number" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                            id="jumlah" value="{{ old('jumlah') }}">
                        @error('jumlah')
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

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-lg-8">
            @if (session()->has('success'))
            {{ session('success') }}
            @endif

            <div class="col-md-12">
                <h2 class="text-center pb-2">Form Kelas</h2>
            </div>

            <div class="row my-4">
                <div class="col-lg-4">
                    <!-- Form Pencarian -->
                    <form method="GET" action="/kelas">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control bi bi-search" value="{{ Request('search') }}"
                                name="search" placeholder="Masukan Pencarian">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Form Pencarian -->
                </div>

                <div class="col-lg-8 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <strong>Add</strong>
                    </button>
                </div>
            </div>

            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">JUMLAH</th>
                        <th scope="col">MHS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>
                            @foreach ($item->mahasiswa as $kls)
                            - {{ $kls->nama_mhs }} <br>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <a href="{{ url('/kelas/'.$item->id.'/edit') }}" class="btn btn-warning">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <form action="{{ url('/kelas/'.$item->id.'/delete') }}" method="POST" class="d-inline mx-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are You Sure {{ $item->name }} ?')">
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div>
                        <a href="/kelas/print" class="btn btn-success btn-sm ml-3" target="_blank">
                            <i class="fa-solid fa-print"></i>
                            Print
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex justify-content-end">
                        <a href="/kelas/export" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-print"></i>
                            Export Excel
                        </a>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $kelas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
