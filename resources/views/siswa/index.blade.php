@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Data Siswa</h3>
    <div class="card">
        <div class="card-body">
            <div class="d-flex pb-3">
                <a href="{{ url('siswa/create') }}" class="btn btn-success my-2 mx-2">Add Data [+]</a>
                <a href="{{ url('siswaPDF') }}" class="btn btn-danger my-2 mx-2">Generate PDF <i class="bi bi-file-earmark-pdf"></i></a>
            </div>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Kelas</th>
                        <th>Tahun Masuk</th>
                        <th>Total Tagihan SPP</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSiswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>{{ $item->spp->tahun }}</td>
                        <td>Rp. {{ number_format($item->tagihan) }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td class="d-flex gap-2">
                            <div>
                                <a href="{{ url('siswa/'.$item->id.'/edit') }}"
                                    class="btn btn-warning btn-sm text-white mr-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                            <div>
                                <a href="{{ url('siswa/'.$item->id.'') }}"
                                    class="btn btn-info btn-sm text-white mr-1">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                            <div>
                                <button type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter{{ $item->id }}"
                                    class="btn btn-danger btn-sm text-white"><i class="bi bi-trash"></i></button>
                            </div>
                        </td>
                        @include('siswa.delete')
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
