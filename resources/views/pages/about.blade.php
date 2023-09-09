@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row mt-3 justify-content-between">
        <div class="col-12">
            <h1 class="text-center mb-4">{{ $name }}</h1>
        </div>

        <div class="col-12">
            <div class="card mb-4">
                <img src="https://source.unsplash.com/1080x200?education" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title text-center">About Laravel</h5>
                    <p class="card-text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi esse quis accusantium iste, culpa
                        provident quaerat? Asperiores autem aut earum itaque exercitationem error veritatis fugiat?
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>

            <div class="col-lg-4 mb-5">
                <div class="card xs:mt-3" style="width: 19rem;">
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
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card xs:mt-3" style="width: 19rem;">
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
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card" style="width: 19rem;">
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
</div>
</div>
@endsection
