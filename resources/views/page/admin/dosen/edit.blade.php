@php
    $title ='Dosen';
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
            {{-- <h1 class="m-0">Tambah Data Dosen</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Dosen</li>
              <li class="breadcrumb-item active">Edit Data</li>
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
                  <h4 class="m-0">Edit Data Dosen</h4>
                <div class="col-sm-2">
                </div>
              </div>
              <div class="card-body">
                <form method="GET" action="{{ url('/dosen/update', $data->id) }}">
                    {{ csrf_field() }}
                      <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nomor Induk Kepegawaian</label>
                          <input name="no_induk" type="number" value="{{$data->no_induk}}" class="form-control @error('no_induk')is-invalid @enderror" id="exampleInputEmail1" placeholder="Nomor induk kepegawaian" readonly>
                            @error('no_induk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Dosen</label>
                          <input name="nama_dosen" type="text" value="{{$data->nama_dosen}}" class="form-control @error('nama_dosen')is-invalid @enderror" id="exampleInputEmail1" placeholder="Nama lengkap dosen dengan gelar">
                            @error('nama_dosen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Program Studi</label>
                          <input name="program_studi" type="text" value="{{$data->jurusan}}" class="form-control @error('program_studi')is-invalid @enderror" id="exampleInputEmail1" placeholder="Program Studi">
                            @error('program_studi')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Fakultas</label>
                          <input name="fakultas" type="text" value="{{$data->fakultas}}" class="form-control @error('fakultas')is-invalid @enderror" id="exampleInputEmail1" placeholder="Fakultas">
                            @error('fakultas')
                              <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input name="email" type="email" value="{{$data->email}}" class="form-control @error('email')is-invalid @enderror" id="exampleInputEmail1" placeholder="Alamat email">
                            @error('email')
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
  </script>
</body>
</html>
