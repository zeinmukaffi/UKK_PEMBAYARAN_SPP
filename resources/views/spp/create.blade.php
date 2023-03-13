@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Add SPP</h3>
    <div class="card">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ url('spp') }}" method="POST">
                @csrf
                <div class="form-body">
                    <a href="{{ url('spp') }}"><i class="bi bi-arrow-left"></i> Back</a>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label>Tahun</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control" name="tahun"
                                placeholder="Tahun" />
                            @error('tahun')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="col-md-4">
                            <label>Nominal</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control number-separator" name="nominal" placeholder="Nominal" />
                            @error('nominal')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <div class="col-md-4">
                            <label>Nominal Per Bulan</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input type="text" class="form-control number-separator" name="per_bulan" placeholder="Nominal Per Bulan" />
                            @error('per_bulan')
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
