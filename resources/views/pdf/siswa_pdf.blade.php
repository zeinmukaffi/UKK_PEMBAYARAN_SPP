<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN DATA SISWA</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>LAPORAN DATA SISWA</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nomor Telepon</th>
                <th>Kelas</th>
                <th>Tahun Masuk</th>
                <th>Total Tagihan SPP</th>
                <th>Alamat</th>
            </tr>
        </thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($siswa as $item)
			<tr>
				<td>{{ $i++ }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->notelp }}</td>
                <td>{{ $item->kelas->nama_kelas }}</td>
                <td>{{ $item->spp->tahun }}</td>
                <td>Rp. {{ number_format($item->tagihan) }}</td>
                <td>{{ $item->alamat }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>