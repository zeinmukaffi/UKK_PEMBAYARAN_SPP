@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Edit Kelas</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('kelas', $kelasId->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-body">
                    <a href="{{ url('kelas') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Nama Kelas</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" value="{{ $kelasId->nama_kelas }}" name="nama_kelas" placeholder="Nama Kelas" />
                            @error('nama_kelas')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Kompetensi Keahlian</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" value="{{ $kelasId->kompetensi_keahlian }}" name="kompetensi_keahlian"
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
