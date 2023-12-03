@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mt-5 col-lg-6">
            <h4 class="card-title mt-3 text-center">Details Jurusan</h4>
            <div class="card-body">
                <form>
                    <fieldset disabled>
                        <div class="form-group">
                            <label for="disabledTextInput"><b>ID JURUSAN :</b> </label>
                            <input type="text" id="disabledInput" class="form-control"
                                value="{{ $details->jurusan }}">
                        </div>
                        <div class="form-group">
                            <label for="disabledTextInput"><b>NAMA JURUSAN :</b></label>
                            <input type="text" id="disabledInput" class="form-control"
                                value="{{ $details->nama_jurusan }}">
                        </div>
                    </fieldset>
                </form>
                <div>
                    <a href="/admin/jurusan">
                        <span class="badge badge-primary">
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>
                    </a>

                    <a href="/admin/jurusan/{{ $details->slug }}/edit" class="ml-2">
                        <span class="badge badge-success">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </span>
                    </a>
                    @if (!$details->mahasiswa->count())
                    <form action="{{ route('jurusan.destroy', $details->id) }}" method="POST" class="d-inline ml-2">
                        @csrf
                        @method('DELETE')
                        <button 
                            onclick="return confirm('Serius jurusan {{ $details->id_jurusan }} akan dihapus ?')" 
                            class="badge badge-danger border-0">
                            <i class="fa-regular fa-circle-xmark"></i>
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    // $('.delete').click(function() {
    //     var jrs = $(this).attr('data-nama');
    //     swal({
    //         title: "Are you sure?",
    //         text: "Kamu akan menghapus " + jrs + " !",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     })
    //     .then((willDelete) => {
    //         window.location = "/delete/"+ jrs +"";
    //         if (willDelete) {
    //             swal("Successfully has been deleted!", {
    //             icon: "success",
    //             });
    //         } else {
    //             swal("Data Has been cancel deleted!");
    //         }
    //     });       
    // });
</script>
@endsection

