@extends('layouts.main')

@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('classes.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">NAMA KELAS</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-lg-9">
            <div class="col-md-12">
                <h4 class="text-start pb-2">Data Kelas</h4>
            </div>

            <div class="row my-4">
                <div class="col-lg-4">
                    <form method="GET" action="/kelas">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control bi bi-search" value="{{ Request('search') }}"
                                name="search" placeholder="Masukan Pencarian">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-8 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <strong>Add</strong>
                    </button>
                </div>
            </div>

            <table id="example" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th scope="col">NAMA</th>
                        <th scope="col">JUMLAH</th>
                        <th scope="col">MHS</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $item)
                    <tr>
                        <td class="text-center">{{ $rank++ }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->mahasiswa->count() }}</td>
                        <td>
                            @foreach ($item->mahasiswa as $kls)
                            - {{ $kls->nama_mhs }} <br>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <button 
                             class="btn btn-warning myBtn" 
                             data-id="{{ $item->id }}" 
                             data-toggle="modal" 
                             data-target="#editKelas"
                            >
                             <i class="fa fa-pen-to-square"></i>
                            </button>
                            <form action="{{ route('classes.destroy', $item->id) }}" method="POST" class="d-inline mx-2">
                                @csrf
                                @method('DELETE')
                                <button 
                                 type="submit" 
                                 class="btn btn-danger"
                                 onclick="return confirm('Are You Sure {{ $item->name }} ?')"
                                >
                                    <i class="fa-regular fa-circle-xmark"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <div class="col">
                    <label class="form-label">&nbsp;</label>
                    <a href="/kelas/export" class="btn btn-secondary btn-sm">
                        <i class="fa-solid fa-print"></i>
                        Export Excel
                    </a>
                </div>
                <div class="d-block">
                    {{ $kelas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         
            <form method="POST" action="{{ route('classes.update') }}">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">NAMA KELAS</label>
                        <input 
                         type="hidden" 
                         name="kelas_id" 
                         id="id_kelas"
                        >
                        <input 
                         type="text" 
                         class="form-control @error('name') is-invalid @enderror" 
                         name="name"
                         id="edit_name" 
                         value="{{ old('name') }}"
                        >
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $(document).on('click','.myBtn',function (event) {
            event.preventDefault();
            var id   = $(this).data('id');
            var path = `/class/edit/${id}`;
            // jQuery.noConflict(); 
            // $('#editKelas').modal('show');
            // console.log(path);

           $.ajax({
                type: "GET",
                url: path,
                success: function (response) {
                    // console.log(response);
                    $('#edit_name').val(response.data.name);
                    $('#id_kelas').val(response.data.id);
                },
                error: function(error){
                    console.log(error);
                }
           });
        });
    });
</script>
@endsection
