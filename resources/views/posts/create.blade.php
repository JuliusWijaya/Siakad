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
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                            name="judul" value="{{ old('judul') }}" placeholder="Judul Post">
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="oke"
                            name="slug" value="{{ old('slug') }}">
                        @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        @error('deskripsi')
                            <p class="text-danger" style="font-size: 13px">
                                {{ $message }}
                            </p>
                        @enderror
                        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
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
    const title = document.getElementById('judul');
    const slug = document.getElementById('oke');
    var path = "{{ route('checkSlug') }}";

    title.addEventListener('change', function () {
        fetch(path.title = +title.value)
            .then(response => response.json)
            .then(data => slug.value = data.slug)
    });

    // var path = "{{ route('checkSlug') }}";

    // $('#judul').change({
    //     source: function(request, response) {
    //         $.ajax({
    //             url: path,
    //             type: 'GET',
    //             dataType: 'json',
    //             data: {
    //                 search: request.term
    //             },
    //             success: function(data){
    //                 response(data);
    //             }
    //         });
    //     },

    //     get:function(event, ui){
    //         $('#slug').val(ui.item.label);
    //         console.log(ui.item);
    //     }
    // });

    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    });

</script>
@endsection
