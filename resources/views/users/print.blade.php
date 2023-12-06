@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('/dist/img/logo.png') }}" alt="logo lp3i" class="img-fluid" width="120">
                </td>
                <td style="width: 10px"></td>
                <td>
                    <h5 class="mb-0">Politeknik LP3I</h5>
                    <p>Jl. Ir. H. Juanda No. KM 2</p>
                </td>
            </tr>
        </table>
    </div>

    <table class="table mt-5">
        <thead class="border border-info">
            <tr>
                <th class="border border-info">NO</th>
                <th class="border border-info">NAMA</th>
                <th class="border border-info">EMAIL</th>
            </tr>
        </thead>
        <tbody class="border border-info" id="data">
            <tr class="border border-info">
                <td class="border border-info">{{ $i = 1 }}</td>
                <td class="border border-info">{{ $user->name }}</td>
                <td class="border border-info">{{ $user->email }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection


