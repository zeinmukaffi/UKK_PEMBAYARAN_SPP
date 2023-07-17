@extends('layout.layout')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<section class="section">
    <h3>Add Kelas</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('kelas') }}" method="POST">
                @csrf
                <div class="form-body">
                    <a href="{{ url('kelas') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Nama Kelas</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas" />
                            @error('nama_kelas')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Kompetensi Keahlian</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="kompetensi_keahlian"
                                placeholder="Kompetensi Keahlian" />
                            @error('kompetensi_keahlian')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
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
