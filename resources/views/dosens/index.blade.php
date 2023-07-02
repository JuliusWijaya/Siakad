@extends('layouts.main')

@section('content')
<div class="container">
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

            <div class="row">
                <div class="col-md-6 d-flex justify-content-start">
                    <a href="{{ route('dosen.create') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="fa-solid fa-user-plus"></i>
                        Add
                    </a>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="/print/dosen" class="btn btn-success btn-sm mb-3" target="_blank">
                        <i class="fa-solid fa-print"></i>
                        Print
                    </a>
                    <a href="/export/dosen" class="btn btn-secondary btn-sm mb-3 ml-3">
                        <i class="fa-solid fa-print"></i>
                        Export Excel
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header mt-3">
                    <h3 class="card-title text-center">Form Dosen</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <form action="/dosen" method="GET" class="d-inline">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control" value="{{request('search')}}"
                                        placeholder="Search Name">
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
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>NO</th>
                            <th>NID</th>
                            <th>NAMA</th>
                            <th>ALAMAT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dosens as $dosen)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dosen->nid }}</td>
                            <td>{{ $dosen->nama }}</td>
                            <td>{{ $dosen->alamat }}</td>
                            <td class="text-center">
                                <a href="/dosen/{{ $dosen->slug }}/details"  class="btn btn-info btn-sm">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
