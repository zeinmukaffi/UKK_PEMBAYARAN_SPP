@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Add Siswa</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('siswa') }}" method="POST">
                @csrf
                <div class="form-body">
                    <a href="{{ url('siswa') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>NISN <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" oninput="this.value=this.value.slice(0,this.maxLength)"
                            type="number" maxlength="8" name="nisn" placeholder="NISN" />
                            @error('nisn')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Nama Lengkap <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="nama"
                                placeholder="Nama Siswa" />
                            @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Tanggal Lahir <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="date" class="form-control" name="tgl_lahir"
                                placeholder="Nama Siswa" />
                            @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Nomor Telepon <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="notelp" placeholder="Nomor Telepon" />
                            @error('notelp')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Kelas <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select class="form-select" name="kelas_id" id="basicSelect">
                                <option>Pilih Kelas</option>
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
                            <select class="form-select spp_id" name="spp_id" id="spp_id">
                                <option>Tahun Masuk</option>
                                @foreach ($spp as $item)
                                <option value="{{ $item->id }}">{{ $item->tahun_masuk }}</option>
                                @endforeach
                              </select>
                            @error('spp_id')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Alamat <span style="color:red;">*</span></label>
                        </div>
                        <div class="col-md-8 form-group">
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                            @error('alamat')
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
@endsection
