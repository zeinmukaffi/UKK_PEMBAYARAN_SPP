@extends('layout.layout')
@section('content')
<section class="section">
    <h3>User Management</h3>
        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <h5 class="font-semibold">Manage Administrator</h5>
                        <a class="btn btn-info" href="{{ url('regIndexAdmin') }}">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <h5 class="font-semibold">Manage Petugas</h5>
                        <a class="btn btn-info" href="{{ url('regIndexPet') }}">Manage</a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <h5 class="font-semibold">Manage Siswa</h5>
                        <a class="btn btn-info" href="{{ url('regIndexSis') }}">Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection