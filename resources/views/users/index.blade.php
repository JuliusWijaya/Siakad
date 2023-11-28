@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show col-lg-12 text-center" role="alert">
                <strong>Hai {{ auth()->user()->name }}</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="col-md-12">
                <h2 class="text-center py-3">Form User</h2>
            </div>
    
            <div class="row">
                <div class="col-lg-5">
                    <!-- Form Pencarian -->
                    <form method="GET" action="/user">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bi bi-search" value="{{ Request('search') }}"
                                name="search" placeholder="Masukan Pencarian">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-7 d-flex justify-content-end">
                    <div>
                        <a href="{{ route('user.create') }}" class="btn btn-primary">
                            <i class="fa-solid fa-user-plus"></i>
                            Add
                        </a>
                    </div>
                </div>
            </div>
    
            @if($users->count())
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class=" text-center">
                            <a href="/user/{{ $user->name }}/details" class="btn btn-info btn-sm">
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
            <div class="row">
                <div class="col-lg-6">
                    <a href="/users/print" target="_blank">
                        <button class="btn btn-success btn-sm ml-3">
                            <i class="fa-solid fa-print"></i>
                            Print
                        </button>
                    </a>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <a href="/users/export">
                        <button class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-print"></i>
                            Export Excel
                        </button>
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
</div>
@endsection
