@extends('layout.layout')
@section('content')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> --}}
<section class="section">
    <h3>Edit Data Siswa</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('siswa/'.$siswaId->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <a href="{{ url('siswa') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Nama Siswa <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" value="{{ $siswaId->nama }}" name="nama"
                                placeholder="Nama Siswa" />
                            @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>NISN <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" oninput="this.value=this.value.slice(0,this.maxLength)"
                            type="number" maxlength="10" name="nisn" value="{{ $siswaId->nisn }}" placeholder="NISN" />
                            @error('nisn')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>NIS <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" oninput="this.value=this.value.slice(0,this.maxLength)"
                            type="number" maxlength="8" name="nis" placeholder="NIS" value="{{ $siswaId->nis }}" />
                            @error('nis')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Nomor Telepon <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="notelp" value="{{ $siswaId->notelp }}" placeholder="Nomor Telepon" />
                            @error('notelp')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Kelas <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            {{-- js-example-tags --}}
                            <select class="form-select" name="kelas_id" id="basicSelect">
                                <option value="{{ $siswaId->kelas_id }}">{{ $siswaId->kelas->nama_kelas }}</option>
                                @foreach ($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kelas }}</option>
                                @endforeach
                            </select>
                            @error('kelas_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Tahun Masuk <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select class="form-select" name="spp_id" id="basicSelect">
                                <option value="{{ $siswaId->spp_id }}">{{ $siswaId->spp->tahun }}</option>
                                @foreach ($spp as $item)
                                <option value="{{ $item->id }}">{{ $item->tahun }}</option>
                                @endforeach
                              </select>
                            @error('spp_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Total Tagihan SPP</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" value="{{ number_format($siswaId->tagihan) }}" disabled placeholder="Nomor Telepon" />
                        </div>
                        <div class="col-md-4">
                            <label>Alamat <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $siswaId->alamat }}</textarea>
                            @error('alamat')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-warning me-1 mb-1">
                                Save
                            </button>
                            <i class="arrow-circle-left"></i>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
{{-- <script>
    $(".js-example-tags").select2({
  tags: true
});
</script> --}}
@endsection
