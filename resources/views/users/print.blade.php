@extends('layouts.utils')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <tr>
                <td>
                    <img src="{{ public_path('/img/1.png') }}" alt="logo lp3i" width="120" height="120">
                </td>
                <td style="width: 10px"></td>
                <td>
                    <h3>{{ $title }}</h3>
                    <p>Jl. Ir. H. Juanda No. KM 2</p>
                </td>
            </tr>
        </table>
    </div>

    <table class="table mt-2">
        <thead class="border border-info">
            <tr>
                <th class="border border-info">NO</th>
                <th class="border border-info">NAMA</th>
                <th class="border border-info">EMAIL</th>
            </tr>
        </thead>
        <tbody class="border border-info">
            @foreach ($users as $user)
            <tr>
                <td class="border border-info">{{ $loop->iteration }}</td>
                <td class="border border-info">{{ $user->name }}</td>
                <td class="border border-info">{{ $user->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
