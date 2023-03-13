@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Detail Siswa</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 row mt-3">
                    <div class="col-md-4">
                        <label>Nama Siswa</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>{{ $siswaId->nama }}</p>
                    </div>
                </div>
                <div class="col-md-1 vl"></div>
                <div class="col-md-5 row mt-3">
                    <div class="col-md-4">
                        <label>Kelas</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>{{ $siswaId->kelas->nama_kelas }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 row mt-3">
                    <div class="col-md-4">
                        <label>NISN</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>{{ $siswaId->nisn }}</p>
                    </div>
                </div>
                <div class="col-md-1 vl"></div>
                <div class="col-md-5 row mt-3">
                    <div class="col-md-4">
                        <label>NIS</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>{{ $siswaId->nis }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 row mt-3">
                    <div class="col-md-4">
                        <label>Nomor Telepon</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>{{ $siswaId->notelp }}</p>
                    </div>
                </div>
                <div class="col-md-1 vl"></div>
                <div class="col-md-5 row mt-3">
                    <div class="col-md-4">
                        <label>Alamat</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>{{ $siswaId->alamat }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 row mt-3">
                    <div class="col-md-4">
                        <label>Tahun Masuk</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>{{ $siswaId->spp->tahun }}</p>
                    </div>
                </div>
                <div class="col-md-1 vl"></div>
                <div class="col-md-5 row mt-3">
                    <div class="col-md-4">
                        <label>Total Tagihan SPP</label>
                    </div>
                    <div class="col-md-2">
                        <label>:</label>
                    </div>
                    <div class="col-md-6 form-group">
                        <p>Rp. {{ number_format($siswaId->tagihan) }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex gap-2 mt-3">
                    <a href="{{ url('siswa') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <a class="text-warning" href="{{ url('siswa/'.$siswaId->id.'/edit') }}"><i class="bi bi-pencil-square"></i> Edit</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection