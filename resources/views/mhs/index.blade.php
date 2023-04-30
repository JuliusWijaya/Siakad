@extends('layouts.main')

@section('content')
<div class="container">
    @if ($mahasiswa->count())
    <div class="row">
        <div class="col-10 pt-5" style="margin: 0 auto;">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Hai <strong>{{ auth()->user()->name }}</strong> {{ session('success')}}
                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm mb-3">
                    <i class="fa-solid fa-user-plus"></i>
                    Add Mhs
                </a>
            
                <a href="/print/mhs" class="btn btn-success btn-sm mb-3 ml-3" target="_blank">
                    <i class="fa-solid fa-print"></i>
                    Cetak PDF
                </a>
            </div>

            <div class="card">
                <div class="card-header mt-3">
                    <h3 class="card-title text-center">Form Mahasiswa</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <form action="/mahasiswa" method="GET" class="d-inline">
                                <div class="input-group mb-3">
                                    <input type="text" name="keyword" class="form-control"
                                        value="{{request('keyword')}}" placeholder="Search Name">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0  ">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>NIM</th>
                                <th>NAMA</th>
                                <th>JK</th>
                                <th>JURUSAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mahasiswa as $mhs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama_mhs }}</td>
                                <td>{{ $mhs->jk }}</td>
                                <td>{{ $mhs->jurusan }}</td>
                                <td class="text-center">
                                    <a href="/mahasiswa/{{$mhs->id}}/edit" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/mahasiswa/{{$mhs->id}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger ml-2"
                                            onclick="return confirm('Serius Mahasiswa {{$mhs->nama}} Akan Di Hapus ?')">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <p class="alert alert-danger text-center text-dark mt-5 col-md-5 text-white" style="margin: 0 auto">
        Not Found Mahasiswa
    </p>
    @endif
</div>
@endsection
