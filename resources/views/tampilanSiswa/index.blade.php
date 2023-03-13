@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Entri Pembayaran SPP Siswa</h3>
    <div class="card">
        <div class="card-header">
            <h5>History Bayar</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Bayar</th>
                        <th>Bulan Di Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Sisa Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tgl_bayar }}</td>
                        <td>{{ $item->bulan_dibayar }}</td>
                        <td>Rp. {{ number_format($item->jumlah_bayar) }}</td>
                        <td>Rp. {{ number_format($item->sisa_tagihan) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
