@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-lg-6">
        {{ dd($kelas) }}
        <h3>Edit Kelas {{ $kelas->name }}</h3>
    </div>
</div>
@endsection