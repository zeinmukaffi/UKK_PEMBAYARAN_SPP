@extends('layout.layout')
@section('content')
<section class="section">
    <h3>Entri Pembayaran SPP Siswa</h3>
    <div class="card">
        <div class="card-header">
            <h5>History Bayar</h5>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Cari Siswa
            </button>
            <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Tahun Masuk</th>
                        <th>Jumlah Bayar</th>
                        <th>Sisa Tagihan</th>
                        <th>Bulan Di Bayar</th>
                        <th>Petugas Penginput</th>
                        @if (Auth::user()->level === 'Admin')
                        <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataBayar as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->sppSiswa->nama }}</td>
                        <td>{{ $item->sppSiswa->kelas->nama_kelas }}</td>
                        <td>{{ $item->sppSiswa->spp->tahun }}</td>
                        <td>Rp. {{ number_format($item->jumlah_bayar) }}</td>
                        <td>Rp. {{ number_format($item->sisa_tagihan) }}</td>
                        <td>{{ $item->bulan_dibayar }}</td>
                        <td>{{ $item->petugas->nama }}</td>
                        @if (Auth::user()->level === 'Admin')
                        <td><a href="{{ url('invoice/'.$item->id.'') }}" class="btn btn-sm btn-info"><i
                                    class="bi bi-receipt"></i></a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped" id="table1">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search mb-2"></i></span>
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Cari Nama Siswa..."
                        />
                      </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($dataSiswa as $item)
                        <tr class="tr">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->kelas->nama_kelas }}</td>
                            <td class="d-flex gap-2">
                                <div>
                                    <a href="{{ url('bayaran/'.$item->id.'') }}"
                                        class="btn btn-success btn-sm text-white mr-1">
                                        <i class="bi bi-cash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Understood</button> --}}
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, nama, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        nama = tr[i].getElementsByTagName("td")[1];
        if (nama) {
          txtValue = nama.textContent || nama.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>
@endsection
