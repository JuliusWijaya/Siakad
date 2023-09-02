@extends('layouts.main')

@section('content')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
</style>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card justify-content-center mt-5 mb-5">
            <h5 class="card-title text-center mt-3">Add New Post</h5>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label mt-2">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Post">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="slug" name="slug">
                    </div>
                    <div class="mb-3">
                        <label for="Penulis" class="form-label d-block">Penulis</label>
                        <select class="form-select" name="user_id" id="user_id">
                            <option selected>-- Pilih Penulis --</option>
                            @foreach ($authors as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Deskripsi</div>
                        <input id="deskripsi" type="hidden" name="deskripsi">
                        <trix-editor input="deskripsi"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const title = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function () {
        fetch('/posts/checkSlug?title=' + title.value)
            .then(response => response.json)
            .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });
</script>
@endsection
