@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12 col-lg-12 mb-5">
            <h4>Info Terbaru</h4>
            <hr>
            <div class="card">
                @foreach ($posts as $item)
                <div class="card-body d-flex flex-wrap">
                  <h6 class="card-subtitle mb-2 text-muted">{{ $item->judul }}</h6>
                  <p class="">
                    {{ $item->deskripsi }}
                  </p>
                  <p>{{ $item->penulis->name }}</p>
                </div>
                @endforeach
              </div>
        </div>
    </div>
</div>
@endsection
