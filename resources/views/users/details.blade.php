@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-5 col-lg-6">
            <h4 class="card-title mt-3 text-center">Details User</h4>
            <div class="card-body">
                <form>
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="disabledTextInput"><b>NAME :</b> </label>
                            <input type="text" id="disabledInput" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="disabledTextInput"><b>EMAIL :</b></label>
                            <input type="text" id="disabledInput" class="form-control" value="{{ $user->email }}">
                        </div>
                    </fieldset>
                </form>
                <div>
                    <a href="/admin/user">
                        <span class="badge badge-primary">
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>

                    <a href="/admin/user/{{ $user->id }}/edit" class="ml-2">
                        <span class="badge badge-success">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </span>
                    </a>

                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline ml-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge badge-danger border-0"
                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus User {{ $user->name }} ??')">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
