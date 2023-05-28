@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row mt-3 justify-content-between">
        <div class="col-12">
            <h1 class="text-center mb-4">{{ $name }}</h1>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/600x500?laravel" class="card-img-top" alt="programming">
            <div class="card-body">
                <h5 class="card-title">About Laravel</h5>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Fugit, iusto minus.
                </p>
                <a href="https://laravel.com/docs/10.x" class="btn btn-primary" target="_blank">Click Here</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/600x500?php" class="card-img-top" alt="programming">
            <div class="card-body">
                <h5 class="card-title">About Laravel</h5>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Fugit, iusto minus.
                </p>
                <a href="https://laravel.com/docs/10.x" class="btn btn-primary">Click Here</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img src="https://source.unsplash.com/600x500?js" class="card-img-top" alt="programming">
            <div class="card-body">
                <h5 class="card-title">About Laravel</h5>
                <p class="card-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Fugit, iusto minus.
                </p>
                <a href="https://laravel.com/docs/10.x" class="btn btn-primary">Click Here</a>
            </div>
        </div>
    </div>
</div>
@endsection
