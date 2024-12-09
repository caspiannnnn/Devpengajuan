@php
    $title ='Pilih Judul';
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
            <h1 class="m-0">Pilih Judul</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Pilih Judul</li>
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
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{{ session('success') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(!$proposal)
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" >
                            <thead>
                            <tr>
                            <th>No.</th>
                            <th>Judul Penelitian</th>
                            <th>Kuota</th>
                            <th>Dosen</th>
                            <th>Pilih</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($data as $d)    
                                <tr>
                                    <td>{{$count."."}}</td>
                                    <td><a href="{{url('/input-judul/edit', $d->id)}}">{{ $d->judul}}</a></td>
                                    <td>{{ $d->kuota}}</td>
                                    <td>{{ $d->pbb1}}</td>
                                    {{-- <td class="text-center" style="width:10%;">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" onclick="klik('{{$d->id}})" value="{{ $d->id}}">
                                            <label for="check_pilih" class="custom-control-label"></label>
                                        </div> 
                                    </td> --}}
                                    <td class="text-center" style="width:2%">
                                      <button type="button" class="btn btn-block btn-outline-primary" onclick="pilihjudul({{$d->id}})">
                                        <i class="fas fa-check-square"></i>
                                      </button>
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
                                <th>Dosen</th>
                                <th>Pilih</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                @else
                <div class="alert alert-primary fade show" role="alert">
                    <h5>Anda sudah memilih judul.</h5>
                    <p>Mohon lanjutkan prosedur selanjutnya.</p>
                    </button>
                </div>
                @endif
                
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
    function pilihjudul(id){
      var r = confirm("Yakin memilih judul?");
                if (r == true) {
                    $.ajax({
                        url: "{{ url('pilih-judul/pilih') }}",
                        data: {'id' : id},
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
    }

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
