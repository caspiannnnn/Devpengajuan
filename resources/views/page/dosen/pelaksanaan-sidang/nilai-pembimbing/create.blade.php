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
                <li class="breadcrumb-item">Nilai Sidang</li>
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
                      <h5 class="m-0"> NIM : {{$data->nim}}</h5>
                      <h5 class="m-0"> Nama Mahasiswa : {{$data->nama}}</h5>
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
                <div class="table-responsive">
                  <form id="form_nilai" method="POST" action="{{ route('pelaksanaan-sidang/nilai-sidang/store') }}">
                  {{ csrf_field() }}
                  <input name="nim" type="hidden" value="{{$data->nim}}" class="form-control @error('pbb1')is-invalid @enderror" id="exampleInputEmail1" placeholder="Judul penelitian">
                    <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th>JABATAN</th>
                          <th>NAMA</th>
                          <th>NILAI</th>
                          <th>NILAI RATA RATA</th>
                          <th>BOBOT</th>
                          <th>NILAI AKHIR</th>
                        </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <td>1.</td>
                                <td>
                                    PEMBIMBING - I
                                </td>
                                <td>
                                  <div class="form-group">
                                      <input name="pbb1" type="text" value="{{old('pbb1')}}" class="form-control @error('pbb1')is-invalid @enderror" id="pbb1" placeholder="Nama Pembimbing-I">
                                      @error('pbb1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <input name="nilai_pbb1" type="text" value="{{old('nilai_pbb1')}}" class="form-control @error('nilai_pbb1')is-invalid @enderror" id="nilai_pbb1" placeholder="Nilai Pembimbing-I">
                                      @error('nilai_pbb1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                              <td rowspan="2" style="vertical-align : middle;text-align:center;">
                                <div class="form-group">
                                    <input name="rata_rata" readonly type="text" value="{{old('rata_rata')}}" class="form-control @error('rata_rata')is-invalid @enderror" id="rata_rata" placeholder="Nilai Rata-rata">
                                    @error('rata_rata')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                              </td>
                              <td rowspan="2" style="vertical-align : middle;text-align:center;">
                                <div class="form-group">
                                    <h2>50%</h2>
                                </div>
                              </td>
                              <td rowspan="2" style="vertical-align : middle;text-align:center;">
                                <div class="form-group">
                                    <input name="nilai_akhir" readonly type="text" value="{{old('nilai_akhir')}}" class="form-control @error('nilai_akhir')is-invalid @enderror" id="nilai_akhir" placeholder="Nilai Akhir">
                                    @error('nilai_akhir')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                              </td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>
                                    PEMBIMBING - II
                                </td>
                                <td>
                                  <div class="form-group">
                                      <input name="pbb2" type="text" value="{{old('pbb2')}}" class="form-control @error('pbb2')is-invalid @enderror" id="pbb2" placeholder="Nama Pembimbing-II">
                                      @error('pbb2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <input name="nilai_pbb2" type="text" value="{{old('nilai_pbb2')}}" class="form-control @error('nilai_pbb2')is-invalid @enderror" id="nilai_pbb2" placeholder="Nilai Pembimbing-II">
                                      @error('nilai_pbb2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="float-right">
                      <button type="submit" class="btn btn-primary"><i class="fas fa-save pr-2" aria-hidden="true"></i>Simpan</button>
                    </div>
                  </form>
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
    $(document).ready(function() {
      $('#nilai_pbb1').keyup(function (evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9\.]/g, ''));
        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
        {
          evt.preventDefault();
        }
      });
      $('#nilai_pbb2').keyup(function (evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9\.]/g, ''));
        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
        {
          evt.preventDefault();
        }
      });

      $("#nilai_pbb1, #nilai_pbb2").keyup(function() {
        var pbb1 = $('#pbb1').val();
        var nilai_pbb1 = $('#nilai_pbb1').val();
        var pbb2 = $('#pbb2').val();
        var nilai_pbb2 = $('#nilai_pbb2').val();
        
        var nilai_rata = ((parseFloat(nilai_pbb1)+parseFloat(nilai_pbb2))/2).toFixed(2);
        var nilai_akhir = ((parseFloat(nilai_pbb1)+parseFloat(nilai_pbb2))).toFixed(2);

        $("#rata_rata").val(nilai_rata);
        $("#nilai_akhir").val(nilai_akhir);
        // console.log(nilai_pbb1);
      });
    });
  </script>
</body>
</html>
