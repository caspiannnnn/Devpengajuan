@php
    $title ='Mahasiswa';
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
                  <h4 class="m-0">Edit Data Mahasiswa</h4>
                <div class="col-sm-2">
                </div>
              </div>
              <div class="card-body">
                <form method="GET" action="{{ url('/mahasiswa/update', $data->id) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                              <label for="exampleInputEmail1">NIM</label>
                              <input readonly type="text" value="{{$data->nim}}" class="form-control @error('nim')is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan NIM" >
                              <input name="nim" type="hidden" value="{{$data->nim}}" class="form-control @error('nim')is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan NIM" >
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama</label>
                              <input name="nama" type="text" value="{{$data->nama}}" class="form-control @error('nama')is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" >
                              @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label>Jenis Kelamin</label>
                              <select name="jenkel" class="form-control select2 @error('jenkel')is-invalid @enderror" style="width: 100%;">
                                <option disabled>Pilih jenis kelamin</option>
                                <option value="L" {{ $data->jenkel=='L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ $data->jenkel=='P' ? 'selected' : '' }}>Perempuan</option>
                              </select>
                              @error('jenkel')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Program Studi</label>
                              <input name="program_studi" value="{{$data->program_studi}}" type="text" class="form-control @error('program_studi')is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" >
                              @error('program_studi')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Fakultas</label>
                              <input name="fakultas" value="{{$data->fakultas}}" type="text" class="form-control @error('fakultas')is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan Nama lengkap" >
                              @error('fakultas')
                                <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nomor Handphone</label>
                              <input name="no_hp" value="{{$data->no_hp}}" type="number" class="form-control @error('no_hp')is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukan nomor handphone" >
                                @error('no_hp')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input name="email" value="{{$data->email}}" type="email" class="form-control @error('email')is-invalid @enderror" id="exampleInputEmail1" placeholder="Alamat email" >
                                @error('email')
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
