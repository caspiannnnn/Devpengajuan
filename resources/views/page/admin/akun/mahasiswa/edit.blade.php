@php
    $title ='Akun Mahasiswa';
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
              <li class="breadcrumb-item">Mahasiswa</li>
              <li class="breadcrumb-item active">Tambah Data</li>
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
                  <h4 class="m-0">Edit Akun Mahasiswa</h4>
                <div class="col-sm-2">
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ url('/akun/mahasiswa/update', $data->id) }}">
                    {{ csrf_field() }}
                    <input readonly name="id_role" type="hidden" value="{{$data->id_role}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIM" required>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">NIM</label>
                              <input readonly name="nim" type="text" value="{{$data->nim}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIM" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama</label>
                              <input readonly name="nama" type="text" value="{{$data->nama}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <input readonly name="nama" type="text" value="{{$data->jenkel=='L' ? 'Laki - laki' : 'Perempuan'}}" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Program Studi</label>
                                <input readonly name="program_studi" value="{{$data->program_studi}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" required>
                              </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fakultas</label>
                                <input readonly name="fakultas" value="{{$data->fakultas}}" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" required>
                              </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Handphone</label>
                                <input readonly name="no_hp" value="{{$data->no_hp}}" type="number" class="form-control" id="exampleInputEmail1" placeholder="Masukan nomor handphone" required>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email" readonly value="{{$data->email}}" type="email" class="form-control" id="exampleInputEmail1" placeholder="Alamat email" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input name="password" type="password" class="form-control  @error('password')is-invalid @enderror" id="exampleInputEmail1" placeholder="Isi untuk merubah password, kosongkan jika tidak">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror  
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit pr-2"></i>Edit Data</button>
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
    //Initialize Select2 Elements
    $('.select2').select2()
    });
  </script>
</body>
</html>
