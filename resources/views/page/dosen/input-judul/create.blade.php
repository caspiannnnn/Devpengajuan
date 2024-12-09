@php
    $title ='Input Judul';
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
            {{-- <h1 class="m-0">Input Judul</h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Input Judul</li>
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
                <div class="col-sm-2">
                  <h4 class="m-0">Input Judul</h4>
                </div>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('input-judul/store') }}">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Judul Penelitian</label>
                      <input name="judul" type="text" value="{{old('judul')}}" class="form-control @error('judul')is-invalid @enderror" id="exampleInputEmail1" placeholder="Judul penelitian">
                      @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kode Dosen</label>
                      <input name="pbb1" type="text" value="{{old('pbb1')}}" class="form-control @error('pbb1')is-invalid @enderror" id="exampleInputEmail1" placeholder="Dosen pembimbing satu">
                        @error('pbb1')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kuota</label>
                      <input name="kuota" type="number" value="{{old('kuota')}}" class="form-control @error('kuota')is-invalid @enderror" id="exampleInputEmail1" placeholder="Kuota">
                        @error('kuota')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
      $("#example1").DataTable({
            "buttons": ["csv", "excel", "pdf", "print"],
            "dom":
                "<'row'<'col-sm-4'l><'col-sm-6'B><'col-sm-2'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-10'i><'col-sm-2'p>>",
        });
    });
  </script>
</body>
</html>
