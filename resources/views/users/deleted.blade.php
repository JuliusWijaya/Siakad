@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center p-3">
        <div class="col-12 col-lg-8">
            <h3>User Deleted</h3>
            <div class="my-3">
                <a href="/admin/user" class="btn btn-secondary btn-sm">
                    <i class="fa fa-reply"></i>
                    Back
                </a>
            </div>

            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA</th>
                        <th>DETAIL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userDeleted as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('restore.user', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-info btn-sm"
                                 onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-refresh"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
