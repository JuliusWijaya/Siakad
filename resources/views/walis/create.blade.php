@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6" style="margin: 0 auto;">
            <div class="card mt-5">
                <h5 class="card-title text-center mb-0 mt-2">Add Wali</h5>
                <div class="card-body">
                    <form method="POST" action="/wali">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="mahasiswa_id">ID MAHASISWA</label>
                              <input type="text" class="form-control @error('mahasiswa_id') is-invalid @enderror"
                                 name="mahasiswa_id" id="search" value="{{ old('mahasiswa_id') }}" placeholder="Masukan Nama Mahasiswa" autofocus required>
                                @error('mahasiswa_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama_wali">NAMA</label>
                                <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali"
                                    name="nama_wali" value="{{ old('nama_wali') }}" placeholder="Masukan Nama Lengkap" required>
                                @error('nama_wali')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="umur">UMUR</label>
                                <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                                name="umur" value="{{ old('umur') }}" placeholder="Masukan Umur">
                                @error('umur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">PEKERJAAN</label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                                    name="pekerjaan" value="{{ old('pekerjaan') }}" placeholder="Masukan Pekerjaan">
                                @error('pekerjaan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/wali" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary" name="simpan" id="simpan">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script type="text/javascript">
    var path = "{{ route('searchmhs') }}";
  
    $("#search").autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function(data) {
               response(data);
            }
          });
        },
        select: function (event, ui) {
           $('#search').val(ui.item.id);
           console.log(ui.item); 
           return false;
        }
    });
</script>
@endsection