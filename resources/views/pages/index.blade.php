@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12 col-lg-12 mb-5">
            <h4>Info Terbaru</h4>
            <hr>
            @foreach ($posts as $item)
            <div class="card mb-3">
                <div class="card-body" style="font-size: 10pt;">
                    <h6 class="card-subtitle text-muted">
                        {!! $item->judul !!} 
                    </h6>
                    <p>
                        {!! $item->deskripsi !!}
                    </p>
                    <br>
                    <p>{!! $item->penulis->name !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
