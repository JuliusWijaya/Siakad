@extends('layouts.main')

@section('content')
<div class="container">
    @if ($walis->count())
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
                <a href="{{ route('wali.create') }}" class="btn btn-primary btn-sm mb-3">
                    <i class="fa-solid fa-user-plus"></i>
                    Add
                </a> 
                <a href="/print/wali" class="btn btn-success btn-sm mb-3 ml-3" target="_blank">
                    <i class="fa-solid fa-print"></i>
                    Cetak PDF
                </a>
            </div>

            <div class="card">
                <div class="card-header mt-3">
                    <h3 class="card-title text-center">Form Wali</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <form action="/wali" method="GET" class="d-inline">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control"
                                        value="{{request('search')}}" placeholder="Search Name">
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
                                <th>NAMA WALI</th>
                                <th>UMUR</th>
                                <th>PEKERJAAN</th>
                                <th>MAHASISWA</th>
                                <th>JURUSAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($walis as $wali)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $wali->nama_wali }}</td>
                                <td>{{ $wali->umur }}</td>
                                <td>{{ $wali->pekerjaan }}</td>
                                <td>{{ $wali->mahasiswa->nama_mhs }}</td>
                                <td>{{ $wali->mahasiswa->jurusan }}</td>
                                <td>
                                    <a href="/wali/{{$wali->id}}/edit" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/wali/{{$wali->id}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger ml-2"
                                            onclick="return confirm('Serius Wali {{$wali->nama}} Akan Di Hapus ?')">
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
        <div class="alert alert-danger text-center text-dark mt-5 col-sm-3 text-white" style="margin: 0 auto">
            Not Found Wali
        </div>
    @endif
</div>
@endsection
