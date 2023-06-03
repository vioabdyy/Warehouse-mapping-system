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
    <h3>Edit Driver</h3>
</div>
<div class="card-body">
    <form action="{{ url('update_driver', $user->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="">nama</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Lorong" value="{{ $user -> name }}">
        </div>

        <div class="form-group">
          <label>level</label> 
          <select name="level" id="level" class="form-control"  value="{{ $user -> level }}">
            
            <?php foreach ($dtuser as $item): ?>
              <option value="user"{{ $item ->level == "user" ? 'selected' : '' }}> user </option>
              <option value="admin"{{ $item ->level == "admin" ? 'selected' : '' }}> admin </option>
              <option value="pengwas"{{ $item ->level == "pengawas" ? 'selected' : '' }}> pengwas </option>
              <option value="penanggung jawab"{{ $item ->level == "penanggung jawab" ? 'selected' : '' }}> penanggung jawab </option>
              <option value="receiving"{{ $item ->level == "receiving" ? 'selected' : '' }}> receiving </option>
              <?php endforeach ?>
            </select>
          </div>
        <div>
            <div class="form-group">
                <label for="">email</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Lorong" value="{{ $user -> email }}">
            </div>

            <div>
                <div class="form-group">
                    <label for="">password</label>
                    <input type="text" id="password" name="password" class="form-control" placeholder="Lorong" value="{{ $user -> password }}">
                </div>

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
