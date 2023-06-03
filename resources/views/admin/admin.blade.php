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
      <h3 class="card-title">DataTable Palet</h3>
      <div class="card-tools">
          @if (Auth()->user()->level == "user")
        <a href="{{ route('tambah_palet') }}"class="btn btn-primary">Tambah Data</a>
          @endif
    </div>
  </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <TH>No</TH>
          <th>No Palet</th>
          <th>No Invoice</th>
          <th>Nama Driver</th>
          <th>Tanggal Masuk</th>
          <th>Tanggal Keluar</th>
          <th>Lorong</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($dtpalet as $item)
          <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $item->no_palet }}</td>
          <td>{{ $item->invoice }}</td>
          <td>{{ $item->user->name }}</td>  
          <td>{{date('d-m-Y', strtotime($item->tglmasuk)) }}</td>
          <td>{{$item->tglpindah}}</td></td>
          <td>{{ $item->lorong }}</td>
          <td>{{ $item->status }}</td>
          <td> 
            @if (Auth()->user()->level == "user")
            <a href="{{ url('edit_palet',$item->id) }}"><i class="fas fa-edit"></i></a>
            |
            <a href="{{ url('delete_palet',$item->id) }}"><i class="fas fa-trash-alt" style="color :red"></i></a>
            @endif
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
