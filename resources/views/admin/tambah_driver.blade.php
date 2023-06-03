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
    <h3>Tambah Driver</h3>
</div>
<div class="card-body">
    <form action="{{ route('simpan_driver') }}" method="post">
        @csrf
        <div class="form-group">
            <label >Nama</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Nama">
        </div>
        
        <div class="form-group">
            <label>Level</label> 
            <select name="level" id="level" class="form-control">
              <option selected disabled>---Pilih Level ---</option>
              <?php foreach ($dtuser as $item): ?>
              <option value="user"{{ $item ->level == "user" ? 'selected' : '' }}> user </option>  
              <?php endforeach ?>
              </select>
            </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="text" id="password" name="password" class="form-control" placeholder="password">
        </div>
        {{-- <div class="form-group">
            <label for="">Status</label>
            <input type="text" id="status" name="status" class="form-control" placeholder="Status" >
        </div> --}}
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </form>
</div>
  </div>
</div>
</div>
@endsection
