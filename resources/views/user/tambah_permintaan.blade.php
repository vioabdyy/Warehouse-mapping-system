@extends('layout.admin1')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ Auth()->user()->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">{{ Auth()->user()->name }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header --> 
  <div class="content">
  <div class="card card-info card-outline">
    <div class="card-header">
    <h3>Tambah Permintaan</h3>
</div>
<div class="card-body">
    <form action="{{ route('simpan_permintaan') }}" method="post">
        @csrf
        <div class="form-group">
          <label>No Palet</label> 
          <select name="no_palet" id="no_palet" class="form-control" required>
            <option value="" selected disabled>---Pilih Nama Receiving ---</option>
            <?php foreach ($barang as $item): ?>
            <option value="{{ $item ->no_palet}}">{{ $item ->no_palet}}</option>
            <?php endforeach ?>
            </select>
          </div>  
  

          <div class="form-group">
            <label>No Invoice</label> 
            <select name="invoice" id="invoice" class="form-control" required>
              <option value="" selected disabled>---Pilih invoice ---</option>
              <?php foreach ($barang as $item): ?>
              <option value="{{ $item ->invoice}}">{{ $item ->invoice}}</option>
              <?php endforeach ?>
              </select>
            </div>  

      <div class="form-group">
        <label>Nama Receiving</label> 
        <select name="user_id" id="user_id" class="form-control">
          <option selected disabled>---Pilih Nama Receiving ---</option>
          <?php foreach ($user as $item): ?>
          <option value="{{ $item ->id}}">{{ $item ->name}}</option>
          <?php endforeach ?>
          </select>
        </div>  

        <div class="form-group">
            <label for="">Tanggal Masuk</label>
            <input type="date" id="tglmasuk" name="tglmasuk" class="form-control" placeholder="Tanggal Masuk">
        </div>
        {{-- <div class="form-group">
            <label for="">Tanggal Keluar</label>
            <input type="date" id="tglpindah" name="tglpindah" class="form-control" placeholder="Tanggal Pemindahan">
        </div> --}}
        <div class="form-group">
          <label>Lorong</label> 
          <select name="lorong" id="lorong" class="form-control" required>
            <option value="" selected disabled>---Pilih Lorong ---</option>
            <?php foreach ($barang as $item): ?>
            <option value="{{ $item ->lorong}}">{{ $item ->lorong}}</option>
            <?php endforeach ?>
            </select>
          </div>  
        {{-- <div class="form-group">
            <label for="">Status</label>
            <input type="text" id="status" name="status" class="form-control" placeholder="Status" >
        </div> --}}
        <div class="form-group">
          <label>Status</label> 
          <select name="status" id="status" class="form-control">
            <option selected disabled>---Pilih Status ---</option>
            <?php  ?>
            <option value="Tersedia"{{ $item ->status == "tersedia" ? 'selected' : '' }}> Tersedia </option>
            <option value="Tidak"{{ $item ->status == " tidak" ? 'selected' : '' }}> Tidak </option>
            <?php ?>
            </select>
          </div>
        <div>
        <div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>
  </div>
</div>
</div>
{{-- <script>
  const form = document.querySelector('form');
const inputs = form.querySelectorAll('input');

form.addEventListener('submit', function(event) {
let values = [];

inputs.forEach(input => {
  if (input.type !== 'submit') {
    values.push(input.value);
  }
});

if (new Set(values).size !== values.length) {
  event.preventDefault();
  alert('Data duplikat tidak diizinkan!');
}
});
</script> --}}
</div>
@endsection
