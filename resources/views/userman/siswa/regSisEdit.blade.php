@extends('layout.layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<section class="section">
    <h3>Edit Akun Siswa</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('regSis/'.$siswaId->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <a href="{{ url('regIndexSis') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Nama Siswa</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select class="form-control js-example-tags" name="siswa_id" id="basicSelect">
                                <option value="{{ $siswaId->siswa_id }}">{{ $siswaId->siswa->nama }}</option>
                                @foreach ($siswa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                              </select>
                            @error('kompetensi_keahlian')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" value="{{ $siswaId->username }}" name="username"
                                placeholder="Username" />
                            @error('username')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="text" style="display: none;" class="form-control" name="level" value="Siswa" placeholder="Nama Petugas" />
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                            <i class="arrow-circle-left"></i>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    $(".js-example-tags").select2({
  tags: true
});
</script>
@endsection
