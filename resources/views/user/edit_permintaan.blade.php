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
    <h3>Edit Permintaan</h3>
</div>
<div class="card-body">
    <form action="{{ url('update_permintaan', $permintaan->id) }}" method="post">
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
          <option value="{{ $permintaan->user_id }}">{{ $permintaan->user->name }}</option>
          <?php foreach ($user as $item): ?>
          <option value="{{ $item ->id}}">{{ $item ->name}}</option>
          <?php endforeach ?>
          </select>
        </div>  

        <div class="form-group">
            <label for="">Tanggal Masuk</label>
            <input type="date" id="tglmasuk" name="tglmasuk" class="form-control" placeholder="Tanggal Masuk" value="{{ $permintaan -> tglmasuk }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal Keluar</label>
            <input type="date" id="tglpindah" name="tglpindah" class="form-control" placeholder="Tanggal Pemindahan " value="{{ $permintaan -> tglpindah }}">
        </div>
       
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
            <input type="text" id="status" name="status" class="form-control" placeholder="Status" value="{{ $permintaan -> status }}">
        </div> --}}
        <div class="form-group">
          <label>Status</label> 
          <select name="status" id="status" class="form-control"  value="{{ $permintaan -> status }}">
            
            <?php foreach ($dtminta as $item): ?>
            <option value="{{ $item ->status}}">{{ $item ->status}}</option>
              <?php endforeach ?>
            </select>
          </div>
        <div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </div>

    </form>
</div>
  </div>
</div>
</div>
@endsection
