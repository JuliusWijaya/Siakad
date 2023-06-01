@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-5 col-lg-6">
            <h4 class="card-title mt-3 text-center">Details Jurusan</h4>
            <div class="card-body">
                <form>
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="disabledTextInput"><b>ID JURUSAN :</b> </label>
                            <input type="text" id="disabledInput" class="form-control"
                                value="{{ $details->id_jurusan }}">
                        </div>
                        <div class="form-group">
                            <label for="disabledTextInput"><b>NAMA JURUSAN :</b></label>
                            <input type="text" id="disabledInput" class="form-control"
                                value="{{ $details->nama_jurusan }}">
                        </div>
                    </fieldset>
                </form>
                <div>
                    <a href="/jurusan">
                        <span class="badge badge-primary">
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>

                    <a href="/jurusan/{{ $details->id_jurusan }}/edit" class="ml-2">
                        <span class="badge badge-success">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </span>
                    </a>

                    <form action="/jurusan/{{ $details->id }}" method="POST" class="d-inline ml-2">
                        @method('delete')
                        @csrf
                        <button type="submit" data-confirm-delete="true" class="badge badge-danger border-0 remove">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
