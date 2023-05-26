@extends('layouts.utils')

@section('content')
<div class="container">
    <h2 class="text-center">{{ $title }}</h2>
    <table class="table">
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
