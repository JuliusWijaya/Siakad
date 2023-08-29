@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-6 offset-md-3">
            <h2 class="text-center p-3">Form Ormawa LP3I</h2>

            @if(session()-> has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Hai <strong>{{ auth()->user()->name }}</strong> {{ session('success') }}.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div>
                <a href="{{ route('ormawa.create') }}" class="btn btn-primary btn-sm mb-3">Add Ormawa</a>
            </div>
            
            <table id="example" class="table table-hover">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>ANGGOTA</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ormawas as $ormawa)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ormawa->name }}</td>
                        <td>
                            @foreach ($ormawa->mahasiswa as $item)
                            - {{ $item->nama_mhs }} <br>
                            @endforeach
                        </td>
                        <td>   
                            <a href="{{ route('ormawa.edit', $ormawa->id) }}" class="btn btn-warning me-2">
                                <i class="fa fa-pen-to-square"></i>
                            </a>
                            <form class="d-inline" action="{{ route('ormawa.destroy', $ormawa->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Serius Mau Di Hapus ?')">
                                    <i class="fa-regular fa-circle-xmark"></i>
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

@section('js')
<script>
    new DataTable('#example');
</script>
@endsection
