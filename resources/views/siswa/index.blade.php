@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Data Siswa</h3>
    <div class="card">
        <div class="card-body">
            <div class="d-flex pb-3">
                <a href="{{ url('siswa/create') }}" class="btn btn-success my-2 mx-2">Add Data [+]</a>
            </div>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Tahun Tagihan SPP</th>
                        <th>Nominal Tagihan SPP (1 Tahun)</th>
                        <th>Jumlah SPP Terbayar</th>
                        <th>Sisa Tagihan SPP</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSiswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>{{ $item->spp->tahun }}</td>
                        <td>{{ $item->spp->nominal }}</td>
                        <td>{{ $item->spp_terbayar }}</td>
                        <td>{{ $item->spp->nominal - $item->spp_terbayar }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="d-flex gap-2" style="justify-content: center">
                            <div>
                                <a href="{{ url('siswa/'.$item->id.'/edit') }}"
                                    class="btn btn-warning btn-sm text-white mr-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div>
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter{{ $item->id }}"
                                    class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                        {{-- @include('siswa.delete') --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
