@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-10">
            <h3 class="text-center mb-3">Form Post</h3>
            <div>
                <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">
                    <i class="fa-solid fa-plus"></i> Create Post
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->judul }}</td>
                        <td>{{ $post->penulis->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection