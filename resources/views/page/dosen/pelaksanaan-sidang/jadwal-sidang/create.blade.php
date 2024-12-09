@php
    $title ='Pelaksanaan Sidang';
@endphp
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('template.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('template.navbar')
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  @include('template.left-sidebar')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pelaksanaan Sidang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Pelaksanaan Sidang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="row">
                  <div class="col-sm-10">
                      <h4 class="m-0"> Pelaksanaan Sidang - Jadwal Sidang</h4>
                  </div>
                  <div class="col-sm-2">
                      {{-- <a href="{{route('status-judul/create')}}" class="btn btn-block btn-primary"><i class="fas fa-plus pr-2"></i>Tambah Data</a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{{ session('success') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ route('jadwal-sidang/store') }}">
                    {{ csrf_field() }}
                          <div class="row">
                              <div class="col-sm-2">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">NIM</label>
                                    <input name="nim" type="text" value="{{$data->nim}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIM" readonly>
                                  </div>
                              </div>
                              <div class="col-sm-4">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input name="nama" type="text" value="{{$data->nama}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" readonly>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Program Studi - Fakultas</label>
                                    <input name="nama" type="text" value="{{$data->program_studi." - ".$data->fakultas}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" readonly>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="exampleInputEmail1">Judul</label>
                                      <input name="program_studi" type="text" value="{{$data->judul}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" readonly>
                                  </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Sidang</label>
                                    <input class="form-control @error('tanggal_sidang')is-invalid @enderror" id="datepicker" name="tanggal_sidang" placeholder="YYYY/MM/DD" type="text"/>
                                    @error('tanggal_sidang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                              <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jam Sidang</label>
                                    <input class="form-control @error('jam_sidang')is-invalid @enderror" id="timepicker" name="jam_sidang" placeholder="HH:SS" type="text"/>
                                    @error('jam_sidang')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                          </div>
                          <div class="float-right">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save pr-2" aria-hidden="true"></i>Simpan</button>
                          </div>
                      </form>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('template.footer')
  <script>
    $(function () {
        $('#datepicker').datepicker({
            format: 'yyyy-mm-dd',
            uiLibrary: 'bootstrap4'
        });
        $('#timepicker').timepicker({
            uiLibrary: 'bootstrap4'
        });
    });
  </script>
</body>
</html>
