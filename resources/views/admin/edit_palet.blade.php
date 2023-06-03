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
    <h3>Edit Palet</h3>
</div>
<div class="card-body">
    <form action="{{ url('update_palet', $admin->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label >Nomor Palet</label>
            <input type="text" id="no_palet" name="no_palet" class="form-control" placeholder="Nomor Palet" value="{{ $admin -> no_palet }}">
        </div>
        <div class="form-group">
          <label >Nomor Invoice</label>
          <input type="text" id="invoice" name="invoice" class="form-control" placeholder="Nomor Invoice"  value="{{ $admin -> invoice }}">
      </div>

      <div class="form-group">
        <label>Nama Driver</label> 
        <select name="user_id" id="user_id" class="form-control select">
          <option selected disabled>---Pilih Nama Driver ---</option>
          <option value="{{ $admin->user_id }}">{{ $admin->user->name }}</option>
        
          <?php foreach ($user as $item): ?>
          <option value="{{ $item ->id}}">{{ $item ->name}}</option>
          <?php endforeach ?>
          </select>
        </div>

        <div class="form-group">
            <label for="">Tanggal Masuk</label>
            <input type="date" id="tglmasuk" name="tglmasuk" class="form-control" placeholder="Tanggal Masuk" value="{{ $admin -> tglmasuk }}">
        </div>
        <div class="form-group">
            <label for="">Tanggal Keluar</label>
            <input type="date" id="tglpindah" name="tglpindah" class="form-control" placeholder="Tanggal Pemindahan " value="{{ $admin -> tglpindah }}">
        </div>
        <div class="form-group">
            <label for="">Lorong</label>
            <input type="text" id="lorong" name="lorong" class="form-control" placeholder="Lorong" value="{{ $admin -> lorong }}">
        </div>
        {{-- <div class="form-group">
            <label for="">Status</label>
            <input type="text" id="status" name="status" class="form-control" placeholder="Status" value="{{ $admin -> status }}">
        </div> --}}
        <div class="form-group">
          <label>Status</label> 
          <select name="status" id="status" class="form-control"  value="{{ $admin -> status }}">
            
            <?php ?>
              <option value="Tersedia"{{ $item ->status == "tersedia" ? 'selected' : '' }}> Tersedia </option>
              <option value="Tidak"{{ $item ->status == " tidak" ? 'selected' : '' }}> Tidak </option>
              <?php ?>
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
