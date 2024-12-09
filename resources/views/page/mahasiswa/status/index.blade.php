@php
    $title ='Status';
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
            <h1 class="m-0">Status</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Status</li>
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
                    {{-- <a href="{{route('pilih-judul/create')}}" class="btn btn-block btn-primary"><i class="fas fa-plus pr-2"></i>Tambah Data</a> --}}
                </div>
              </div>
              <div class="card-body">
                @foreach ($data as $d)    
                    @if ($d->status=='Pengajuan')
                      <div class="alert alert-primary fade show" role="alert">
                        <p>Judul anda belum disetujui</p>
                      </div>
                    @elseif (($d->status=='Disetujui') && empty($d->id_repo))
                        <div class="alert alert-success fade show" role="alert">
                            <p>Judul anda sudah disetujui, silakan upload file tugas anda <a href="{{route('status/create')}}">disini</a></p>
                        </div>
                    @elseif (($d->status=='Disetujui') && (!empty($d->id_repo)))
                        <div class="alert alert-success text-white fade show" role="alert">
                            <p>Anda telah mengupload file</p> 
                        </div>
                    @elseif ($d->status=='Revisi' && $d->status_revisi=='Belum')
                        <div class="alert alert-warning text-white fade show" role="alert">
                            <p>Terdapat revisi pada tugas anda, lihat <a href="{{url('lihat-revisi')}}">disini</a></p> 
                        </div>
                    @elseif ($d->status=='Revisi' && $d->status_revisi=='Tinjau')
                        <div class="alert alert-warning text-white fade show" role="alert">
                            <p>Revisi sedang ditinjau</p> 
                        </div>
                    @elseif ($d->status=='Selesai')
                        <div class="alert alert-success text-white fade show" role="alert">
                            <p>Anda telah selesai mengerjakan tugas</a></p> 
                        </div>
                    @elseif ($d->status=='Sidang')
                        <div class="alert alert-success text-white fade show" role="alert">
                            <p>Sidang pada tanggal {{$data_jadwal['tanggal_sidang']}} pukul {{$data_jadwal['jam_sidang']}}</a></p> 
                        </div>
                    @elseif ($d->status=='Lulus')
                        <div class="alert alert-success text-white fade show" role="alert">
                            <p>Anda dinyatakan lulus</a></p> 
                        </div>
                    @endif
                @endforeach
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" >
                            <thead>
                            <tr>
                            <th>No.</th>
                            <th>Judul Penelitian</th>
                            <th>Kuota</th>
                            <th>Dosen Pembimbing</th>
                            <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($data as $d)    
                                <tr>
                                    <td>{{$count."."}}</td>
                                    <td>{{ $d->judul}}</td>
                                    <td>{{ $d->kuota}}</td>
                                    <td>{{ $d->pbb1}}</td>
                                    <td>
                                        @if ($d->status == 'Pengajuan')
                                            <span class="badge badge-primary">Pengajuan</span> 
                                        @elseif ($d->status == 'Disetujui')
                                            <span class="badge badge-success">Disetujui</span> 
                                        @elseif ($d->status=='Revisi' && $d->status_revisi=='Belum')
                                            <span class="badge badge-warning text-white">Revisi</span> 
                                        @elseif ($d->status=='Revisi' && $d->status_revisi=='Tinjau')
                                            <span class="badge badge-warning text-white">Peninjauan Revisi</span> 
                                        @elseif ($d->status == 'Selesai')
                                            <span class="badge badge-success">Selesai</span> 
                                        @elseif ($d->status == 'Sidang')
                                            <span class="badge badge-success">Sidang</span> 
                                        @elseif ($d->status == 'Lulus')
                                            <span class="badge badge-success">Lulus</span> 
                                        @endif
                                    </td>
                                </tr>
                            @php
                                $count++;
                            @endphp
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Judul Penelitian</th>
                                <th>Kuota</th>
                                <th>Dosen Pembimbing</th>
                                <th>Pilih</th>
                            </tr>
                            </tfoot>
                        </table>
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
      $("#example1").DataTable({
            "buttons": ["csv", "excel", "pdf", "print"],
            "dom":
                "<'row'<'col-sm-4'><'col-sm-6'><'col-sm-2'>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-10'><'col-sm-2'>>",
        });

        $("#check_pilih").change(function(event){
            var check_pilih = $("#check_pilih").val();
            if (this.checked){
                var r = confirm("Yakin memilih judul?");
                if (r == true) {
                    $.ajax({
                        url: "{{ url('pilih-judul/pilih') }}",
                        data: {'id' : check_pilih},
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        type:'POST',
                        success: function(data) {
                        alert(data);
                        location.reload();
                        // console.log(data);
                        },
                        error: function(jqXHR, textStatus, errorThrown) { 
                            console.log(JSON.stringify(jqXHR));
                            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                } else {
                    alert("Batal memilih judul");
                    $( "#check_pilih" ).prop( "checked", false );
                }
            } else {
                // alert("turn off checkout history.");
            }
            
        });
    });
  </script>
</body>
</html>
