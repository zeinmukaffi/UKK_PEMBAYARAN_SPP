@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Add Admin</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('regAdmin') }}" method="POST">
                @csrf
                <div class="form-body">
                    <a href="{{ url('regIndexAdmin') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Username</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="username"
                                placeholder="Username" />
                            @error('username')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label>Nama Petugas</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Petugas" />
                            @error('nama')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="col-md-8 form-group"> --}}
                            <input type="text" style="display: none;" class="form-control" name="level" value="Admin" placeholder="Nama Petugas" />
                        {{-- </div> --}}
                        <div class="col-md-4">
                            <label>Password</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                            @error('password')
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
                            <i class="arrow-circle-left"></i>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
