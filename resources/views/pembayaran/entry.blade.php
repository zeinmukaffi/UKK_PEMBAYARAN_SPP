@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Entri Pembayaran SPP Siswa</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('/pay') }}" method="POST">
                @csrf
                <div class="form-body">
                    <a href="{{ url('/pembayaran') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Nama Siswa</label>
                        </div>
                        <input type="number" style="display: none;" name="siswa_id" value="{{ $bayarId->id }}">
                        <input type="number" style="display: none;" name="petugas_id" value="{{ Auth::user()->id }}">
                        <input type="text" style="display: none;" name="status">
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control"
                                disabled value="{{ $bayarId->nama }}" />
                        </div>
                        <div class="col-md-4">
                            <label>NISN</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" disabled value="{{ $bayarId->nisn }}"
                            type="number" maxlength="10"/>
                        </div>
                        <div class="col-md-4">
                            <label>NIS</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" disabled value="{{ $bayarId->nis }}"
                            type="number" maxlength="8"/>
                        </div>
                        <div class="col-md-4">
                            <label>Kelas</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select class="form-select" disabled id="basicSelect">
                                <option>{{ $bayarId->kelas->nama_kelas }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>SPP (Tahun)</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select class="form-select" disabled id="basicSelect">
                                <option>{{ $bayarId->spp->tahun }}</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Tagihan</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" value="{{ number_format($bayarId->tagihan) }}" disabled placeholder="Nomor Telepon" />
                        </div>
                        <div class="col-md-4">
                            <label>Tagihan Per Bulan</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="jumlah_bayar" value="{{ number_format($bayarId->spp->per_bulan) }}" readonly />
                            @error('jumlah_bayar')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Tanggal Bayar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="date" class="form-control" name="tgl_bayar" placeholder="Tanggal Bayar" />
                            @error('tgl_bayar')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Bulan Di Bayar</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <select class="form-select" name="bulan_dibayar" id="basicSelect">
                                <option>Pilih Bulan Bayar</option>
                                <option value="JANUARI">Januari</option>
                                <option value="FEBRUARI">Februari</option>
                                <option value="MARET">Maret</option>
                                <option value="APRIL">April</option>
                                <option value="MEI">Mei</option>
                                <option value="JUNI">Juni</option>
                                <option value="JULI">Juli</option>
                                <option value="AGUSTUS">Agustus</option>
                                <option value="SEPTEMBER">September</option>
                                <option value="OKTOBER">Oktober</option>
                                <option value="NOVEMBER">November</option>
                                <option value="DESEMBER">Desember</option>
                            </select>
                            @if ($pesan = Session::get('message'))
                            <p class="alert alert-danger mt-1" role="alert">
                                {{ $pesan }}
                            </p>
                            @endif
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
