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
            <h1 class="m-0">Akun Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Akun Mahasiswa</li>
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
                </div>
                <h4>Approve Akun Mahasiswa</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" >
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nim</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Email</th>
                          <th>Program Studi</th>
                          <th>Fakultas</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($data as $d)    
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{ $d->nim}}</td>
                                <td>{{ $d->nama}}</td>
                                <td>{{ $d->jenkel=='L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $d->email}}</td>
                                <td>{{ $d->program_studi}}</td>
                                <td>{{ $d->fakultas}}</td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-primary" onclick="approveakun({{$d->id}})">
                                        <i class="fas fa-check pr-2"></i> Approve Akun
                                    </button>
                                    {{-- <a href="{{url('/akun/mahasiswa/approve', $d->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-check pr-2"></i></i>Approve Akun</a> --}}
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
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Program Studi</th>
                            <th>Fakultas</th>
                            <th>Aksi</th>
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

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- /.col-md-6 -->
            <div class="col-lg-12">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <div class="col-sm-2">
                  </div>
                  <h4>Edit Akun Mahasiswa</h4>
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
                      <table id="example2" class="table table-bordered table-striped" >
                          <thead>
                          <tr>
                            <th>No.</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Program Studi</th>
                            <th>Fakultas</th>
                            <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                          @php
                              $count = 1;
                          @endphp
                          @foreach ($data_akun as $d)    
                              <tr>
                                  <td>{{$count}}</td>
                                  <td>{{ $d->nim}}</td>
                                  <td>{{ $d->nama}}</td>
                                  <td>{{ $d->jenkel=='L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                  <td>{{ $d->email}}</td>
                                  <td>{{ $d->program_studi}}</td>
                                  <td>{{ $d->fakultas}}</td>
                                  <td class="text-center">
                                      <a href="{{url('/akun/mahasiswa/edit', $d->id)}}" class="btn btn-sm btn-success"><i class="fas fa-user-edit pr-2"></i>Edit</a>
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
                              <th>Nim</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Email</th>
                              <th>Program Studi</th>
                              <th>Fakultas</th>
                              <th>Aksi</th>
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
    function approveakun(id){
        $.ajax({
            url: "{{ url('akun/mahasiswa/approve') }}",
            data: {
              'id' : id
            },
            dataType: 'json',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            success: function(data) {
                if(data.sukses == 1){
                    alert(data.msg);
                }
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) { 
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    }

    $(function () {
      $("#example1").DataTable({
            "buttons": ["csv", "excel", "pdf", "print"],
            "dom":
                "<'row'<'col-sm-4'l><'col-sm-6'B><'col-sm-2'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-10'i><'col-sm-2'p>>",
        });
      $("#example2").DataTable({
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
