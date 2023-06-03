@extends('layout.admin1')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><b>{{ Auth()->user()->name }}</b></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header --> 
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable Driver</h3>
      <div class="card-tools">
        <a href="{{ route('tambah_driver') }}"class="btn btn-primary">Tambah Driver</a>
    </div>
  </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <TH>No</TH>
          <th>Nama</th>
          <th>Level</th>
          <th>Email</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($dtuser as $item)
          <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->level }}</td>
          <td>{{ $item->email }}</td>
          <td> 
            <a href="{{ url('edit_driver',$item->id) }}"><i class="fas fa-edit"></i></a>
            |
            <a href="{{ url('delete_driver',$item->id) }}"><i class="fas fa-trash-alt" style="color :red"></i></a>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>
@include('sweetalert::alert')
@endsection
