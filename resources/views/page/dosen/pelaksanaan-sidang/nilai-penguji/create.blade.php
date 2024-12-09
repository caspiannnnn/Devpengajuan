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
                  <form id="form_nilai" method="POST" action="{{ route('penguji/nilai-sidang/store') }}">
                  {{ csrf_field() }}
                  <input name="nim" type="hidden" value="{{$data->nim}}" class="form-control @error('pbb1')is-invalid @enderror" id="exampleInputEmail1" placeholder="Judul penelitian">
                    <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th>JABATAN</th>
                          <th>NAMA</th>
                          <th>PEMAPARAN</th>
                          <th>MATERI POKOK</th>
                          <th>Masalah & Topik Yang diajukan</th>
                          <th>JUMLAH (100%)</th>
                          <th>NILAI RATA RATA</th>
                          <th>BOBOT</th>
                          <th>NILAI AKHIR</th>
                        </tr>
                        </thead>
                        <tbody>   
                            <tr>
                                <td>1.</td>
                                <td>
                                    PENGUJI - I
                                </td>
                                <td style="width:15%;">
                                  <div class="form-group">
                                      <input name="penguji_1" type="text" value="{{old('penguji_1')}}" class="form-control @error('penguji_1')is-invalid @enderror" id="penguji_1" placeholder="Nama Penguji-I">
                                      @error('penguji_1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <input name="pemaparan_p1" type="text" value="{{old('pemaparan_p1')}}" class="form-control @error('pemaparan_p1')is-invalid @enderror" id="pemaparan_p1" placeholder="pemaparan_p1">
                                      @error('pemaparan_p1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="materi_pokok_p1" type="text" value="{{old('materi_pokok_p1')}}" class="form-control @error('materi_pokok_p1')is-invalid @enderror" id="materi_pokok_p1" placeholder="materi_pokok_p1">
                                        @error('materi_pokok_p1')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="masalah_p1" type="text" value="{{old('masalah_p1')}}" class="form-control @error('masalah_p1')is-invalid @enderror" id="masalah_p1" placeholder="masalah_p1">
                                        @error('nilai_pbb1')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td style="vertical-align : middle;text-align:center;">
                                    <div class="form-group">
                                        <input name="jumlah_p1" readonly type="text" value="{{old('jumlah_p1')}}" class="form-control @error('jumlah_p1')is-invalid @enderror" id="jumlah_p1" placeholder="Jumlah-I">
                                        @error('jumlah_p1')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td rowspan="3" style="vertical-align : middle;text-align:center;">
                                    <div class="form-group">
                                        <input name="rata_rata" readonly type="text" value="{{old('rata_rata')}}" class="form-control @error('rata_rata')is-invalid @enderror" id="rata_rata" placeholder="Nilai Rata-rata">
                                        @error('rata_rata')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td rowspan="3" style="vertical-align : middle;text-align:center;">
                                    <div class="form-group">
                                        <h2>50%</h2>
                                    </div>
                                </td>
                                <td rowspan="3" style="vertical-align : middle;text-align:center;">
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
                                    PENGUJI - II
                                </td>
                                <td style="width:15%;">
                                  <div class="form-group">
                                      <input name="penguji_2" type="text" value="{{old('penguji_2')}}" class="form-control @error('penguji_2')is-invalid @enderror" id="penguji_2" placeholder="Nama Penguji-I">
                                      @error('penguji_2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <input name="pemaparan_p2" type="text" value="{{old('pemaparan_p2')}}" class="form-control @error('pemaparan_p2')is-invalid @enderror" id="pemaparan_p2" placeholder="pemaparan_p2">
                                      @error('pemaparan_p2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="materi_pokok_p2" type="text" value="{{old('materi_pokok_p2')}}" class="form-control @error('materi_pokok_p2')is-invalid @enderror" id="materi_pokok_p2" placeholder="materi_pokok_p2">
                                        @error('materi_pokok_p2')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="masalah_p2" type="text" value="{{old('masalah_p2')}}" class="form-control @error('masalah_p2')is-invalid @enderror" id="masalah_p2" placeholder="masalah_p2">
                                        @error('masalah_p2')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td style="vertical-align : middle;text-align:center;">
                                    <div class="form-group">
                                        <input name="jumlah_p2" readonly type="text" value="{{old('jumlah_p2')}}" class="form-control @error('jumlah_p2')is-invalid @enderror" id="jumlah_p2" placeholder="Jumlah-II">
                                        @error('jumlah_p2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>
                                    PENGUJI - III
                                </td>
                                <td style="width:15%;">
                                  <div class="form-group">
                                      <input name="penguji_3" type="text" value="{{old('penguji_3')}}" class="form-control @error('penguji_3')is-invalid @enderror" id="penguji_3" placeholder="Nama Penguji-III">
                                      @error('penguji_3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                      <input name="pemaparan_p3" type="text" value="{{old('pemaparan_p3')}}" class="form-control @error('pemaparan_p3')is-invalid @enderror" id="pemaparan_p3" placeholder="pemaparan_p3">
                                      @error('pemaparan_p3')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                                  </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="materi_pokok_p3" type="text" value="{{old('materi_pokok_p3')}}" class="form-control @error('materi_pokok_p3')is-invalid @enderror" id="materi_pokok_p3" placeholder="materi_pokok_p3">
                                        @error('materi_pokok_p3')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input name="masalah_p3" type="text" value="{{old('masalah_p3')}}" class="form-control @error('masalah_p3')is-invalid @enderror" id="masalah_p3" placeholder="masalah_p3">
                                        @error('masalah_p3')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </td>
                                <td style="vertical-align : middle;text-align:center;">
                                    <div class="form-group">
                                        <input name="jumlah_p3" readonly type="text" value="{{old('jumlah_p3')}}" class="form-control @error('jumlah_p3')is-invalid @enderror" id="jumlah_p3" placeholder="Jumlah-III">
                                        @error('jumlah_p3')
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
      $('#pemaparan_p1, #pemaparan_p2, #pemaparan_p3, #materi_pokok_p1, #materi_pokok_p2, #materi_pokok_p3, #masalah_p1, #masalah_p2, #masalah_p3').keyup(function (evt) {
        var self = $(this);
        self.val(self.val().replace(/[^0-9\.]/g, ''));
        if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
        {
          evt.preventDefault();
        }
      });

      $("#pemaparan_p1, #pemaparan_p2, #pemaparan_p3, #materi_pokok_p1, #materi_pokok_p2, #materi_pokok_p3, #masalah_p1, #masalah_p2, #masalah_p3").keyup(function() {
        var pemaparan_p1 = $('#pemaparan_p1').val();
        var pemaparan_p2 = $('#pemaparan_p2').val();
        var pemaparan_p3 = $('#pemaparan_p3').val();
        
        var materi_pokok_p1 = $('#materi_pokok_p1').val();
        var materi_pokok_p2 = $('#materi_pokok_p2').val();
        var materi_pokok_p3 = $('#materi_pokok_p3').val();
        
        var masalah_p1 = $('#masalah_p1').val();
        var masalah_p2 = $('#masalah_p2').val();
        var masalah_p3 = $('#masalah_p3').val();
        
        var jumlah_p1 = (parseFloat(pemaparan_p1)+parseFloat(materi_pokok_p1)+parseFloat(masalah_p1)).toFixed(2);
        var jumlah_p2 = (parseFloat(pemaparan_p2)+parseFloat(materi_pokok_p2)+parseFloat(masalah_p2)).toFixed(2);
        var jumlah_p3 = (parseFloat(pemaparan_p3)+parseFloat(materi_pokok_p3)+parseFloat(masalah_p3)).toFixed(2);
        
        // var nilai_rata = ((parseFloat(jumlah_p1)+parseFloat(jumlah_p2)+parseFloat(jumlah_p3))/3).toFixed(2);
        var rata_jumlah_p1 = (parseFloat(jumlah_p1)/3);
        var rata_jumlah_p2 = (parseFloat(jumlah_p2)/3);
        var rata_jumlah_p3 = (parseFloat(jumlah_p3)/3);

        var nilai_rata = ((parseFloat(rata_jumlah_p1)+parseFloat(rata_jumlah_p2)+parseFloat(rata_jumlah_p3))/3).toFixed(2);
        var nilai_akhir = ((parseFloat(jumlah_p1)+parseFloat(jumlah_p2)+parseFloat(jumlah_p3))).toFixed(2);

        $("#jumlah_p1").val(jumlah_p1);
        $("#jumlah_p2").val(jumlah_p2);
        $("#jumlah_p3").val(jumlah_p3);

        $("#rata_rata").val(nilai_rata);
        $("#nilai_akhir").val(nilai_akhir);
        // console.log(nilai_pbb1);
      });
    });
  </script>
</body>
</html>
