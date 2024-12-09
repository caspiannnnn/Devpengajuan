@php
    $title ='Lihat Revisi';
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
            <h1 class="m-0">Revisi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Revisi</li>
                <li class="breadcrumb-item">Lihat File</li>
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
                      <h4 class="m-0"> Lihat File</h4>
                    </div>
                    <div class="col-sm-2">
                        {{-- <a href="{{route('status-judul/create')}}" class="btn btn-block btn-primary"><i class="fas fa-plus pr-2"></i>Tambah Data</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('lihat-revisi/save') }}" class="mt-4">
                  {{ csrf_field() }}
                  <input name="id_repo" type="hidden" class="form-control" value="{{$data->id_repo}}">
                  <input name="id_proposal" type="hidden" class="form-control" value="{{$data->id_proposal}}">
                  <input name="file_path" type="hidden" class="form-control" value="{{$data->local_path}}">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul Penelitian</label>
                          <input name="judul" type="text" value="{{$data->judul}}" class="form-control" id="exampleInputEmail1" placeholder="Judul penelitian" disabled>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kode Dosen</label>
                          <input name="pbb1" type="text" value="{{$data->kode_dosen}}" class="form-control" id="exampleInputEmail1" placeholder="Dosen pembimbing satu" disabled>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Kuota</label>
                          <input name="pbb1" type="text" value="{{$data->kuota}}" class="form-control" id="exampleInputEmail1" placeholder="Dosen pembimbing satu" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Revisi</label>
                          <textarea name="revisi_text" class="form-control" rows="5" placeholder="Masukan detail revisi ..." readonly>{{$data->revisi_text}}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="customFile">Upload File</label>
                            <div class="custom-file">
                              <input type="file" name="upload_file" class="custom-file-input @error('upload_file')is-invalid @enderror" id="upload_file">
                              <label class="custom-file-label" for="customFile">Choose file</label>
                                @error('upload_file')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                      </div>
                    </div>
                    
                  <div class="float-right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save pr-2" aria-hidden="true"></i>Upload File Revisi</button>
                  </div>
                </form>
              </div>
              <div class="row mb-4 mr-2">
                <div class="col-sm-12">
                  <div class="float-right">
                    {{-- <button onclick="selesairevisi({{$data->nim}})" id="selesai_revisi" type="submit" class="btn btn-success"><i class="fas fa-save pr-2" aria-hidden="true"></i>Selesai Revisi</button> --}}
                  </div>
                </div>
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
    $('.select2').select2();
    bsCustomFileInput.init();
    });
  </script>
</body>
</html>
