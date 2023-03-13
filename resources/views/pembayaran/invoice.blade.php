<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>scholifee - invoice</title>
    {{-- <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" /> --}}
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url(dimension.png);
        }

        #project {
            float: left;
        }

        #project span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }

    </style>
</head>

<body>
    <header class="clearfix">
        <h1>BUKTI PEMBAYARAN SPP {{ $bayarId->bulan_dibayar }}</h1>
        <div id="company" class="clearfix">
            <div>{{ $bayarId->sppSiswa->nisn }}</div>
            <div>{{ $bayarId->sppSiswa->nis }}</div>
            <div>{{ $bayarId->sppSiswa->kelas->nama_kelas }}</div>
        </div>
        <div id="project">
            <div><span>PETUGAS</span> {{ $bayarId->petugas->nama }}</div>
            <div><span>SISWA</span> {{ $bayarId->sppSiswa->nama }}</div>
            <div><span>ALAMAT</span> {{ $bayarId->sppSiswa->alamat }}</div>
            <div><span>NO TELP</span> {{ $bayarId->sppSiswa->notelp }}</div>
            <div><span>TANGGAL</span> {{ $bayarId->tgl_bayar }}</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>TANGGAL BAYAR</th>
                    <th>BULAN BAYAR</th>
                    <th>JUMLAH BAYAR</th>
                    <th>SISA TAGIHAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr {{ ($bayarId->bulan_dibayar != $item->bulan_dibayar ) }}style="color    : cadetblue">
                    <td>{{ $item->tgl_bayar }}</td>
                    <td>{{ $item->bulan_dibayar }}</td>
                    <td>{{ number_format($item->jumlah_bayar) }}</td>
                    <td>{{ number_format($item->sisa_tagihan) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>
