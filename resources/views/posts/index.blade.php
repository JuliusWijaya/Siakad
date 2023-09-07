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
    @if ($posts->count())
            <table class="table table-hover">
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
                        <td>
                            <a href="/post/{{ $post->slug }}/edit" class="btn btn-info mx-2"><i class="fa fa-pen-to-square"></i></a>
                            <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Serius Mau Di Hapus Post {{ $post->judul }}')">
                                    <i class="fa fa-circle-xmark"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>                
            @else
            <div class="col-lg-4 mx-auto">
                <div class="alert alert-danger text-center mt-5">
                    Not Found Postingan
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
