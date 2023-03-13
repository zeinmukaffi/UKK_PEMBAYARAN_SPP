@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Data Akun Siswa</h3>
    <div class="card">
        <div class="card-body">
            <a href="{{ url('userManagement') }}"><i class="bi bi-arrow-left"></i> Back</a>
            <div class="d-flex pb-3">
                <a href="{{ url('regSis') }}" class="btn btn-success my-2 mx-2">Add Akun Siswa [+]</a>
            </div>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataReg as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->level }}</td>
                        <td class="d-flex gap-2" style="justify-content: center">
                            <div>
                                <a href="{{ url('regSis/'.$item->id.'/edit') }}"
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
                        @include('userman.siswa.deleteSis')
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
