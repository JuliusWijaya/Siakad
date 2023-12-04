@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-12 p-5 ml-5">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Hai <strong>{{ auth()->user()->name }}</strong> {{ session('success')}}
                <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="row mt-5">
                <div class="col-md-6 justify-content-start">
                    <a href="{{ route('wali.create') }}" class="btn btn-primary btn-sm mb-3">
                        <i class="fa-solid fa-user-plus"></i>
                        Add
                    </a> 
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <div class="input-group input-group-sm" style="width: 250px;">
                        <form action="{{ route('print.wali') }}" method="POST" class="d-inline">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="hidden" name="search" id="id_wali">
                                <select id="val" class="form-control"
                                    value="{{request('search')}}">
                                    <option value="">-- Chosee Wali --</option>
                                    @foreach ($walis as $item)
                                    <option value="{{ $item->id }}" >{{ $item->nama_wali }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success mb-3">
                                        <i class="fa-solid fa-print"></i>
                                       Print
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <a href="/export/wali" class="btn btn-secondary btn-sm mb-3 ml-2">
                        <i class="fa-solid fa-print"></i>
                        Export Excel
                    </a>
                </div>
            </div>

            @if ($walis->count())
            <div class="card p-3 mt-3">
                <div class="card-header">
                    <h3 class="card-title text-center">Form Wali</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <form action="/admin/wali" method="GET" class="d-inline">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" class="form-control"
                                        value="{{request('search')}}" placeholder="Search Name">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>NO</th>
                                <th>NAMA WALI</th>
                                <th>UMUR</th>
                                <th>PEKERJAAN</th>
                                <th>MAHASISWA</th>
                                <th>JURUSAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($walis as $wali)
                            <tr>
                                <td>{{ $rank++ }}</td>
                                <td>{{ $wali->nama_wali }}</td>
                                <td>{{ $wali->umur }}</td>
                                <td>{{ $wali->pekerjaan }}</td>
                                <td>{{ (isset($wali->mahasiswa->nama_mhs)) ? $wali->mahasiswa->nama_mhs : 'Not Found' }}</td>
                                <td>{{ (isset($wali->mahasiswa->jurusan->jurusan)) ? $wali->mahasiswa->jurusan->jurusan : 'Not Found' }}</td>
                                <td>
                                    <a href="/admin/wali/{{$wali->slug}}/edit" class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/wali/{{$wali->id}}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger ml-2"
                                            onclick="return confirm('Serius Wali {{$wali->nama_wali}} Akan Di Hapus ?')">
                                            <i class="fa-regular fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $walis->links() }}
            </div>
        </div>
    </div>
    @else
        <div class="alert alert-danger text-center text-dark mt-5 col-sm-3 text-white" style="margin: 0 auto">
            Not Found Wali
        </div>
    @endif
</div>
@endsection


@section('js')
<script>
    $(document).ready(function () {
        $("#val").change(function (e) { 
            e.preventDefault();
            var id = $(this).val();
            var path = `/print/wali/${id}`;
            // console.log(id);

            $.ajax({
                type: "GET",
                url: path,
                data: id,
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $('#id_wali').val(data.datas.id);
                }
            });
        }); 
    });
</script>
@endsection