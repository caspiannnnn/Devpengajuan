
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tugas Akhir | Register</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin-lte-3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin-lte-3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admin-lte-3/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-lte-3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-lte-3/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Register</b></a>
    </div>
    <div class="card-body">
      {{-- <p class="login-box-msg">Register a new membership</p> --}}

      <form action="{{url('/register/store')}}" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" name="username" value="{{old('username')}}" class="form-control @error('username')is-invalid @enderror" placeholder="{{__('Nomor Induk Mahasiswa')}}">
          <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
          </div>
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="name" value="{{old('name')}}"  class="form-control @error('name')is-invalid @enderror" placeholder="{{__('Nama Lengkap')}}">
          <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
          </div>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
            <select name="jenkel" class="form-control select2 @error('jenkel')is-invalid @enderror" style="width: 100%;">
              <option selected="selected" disabled>Jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          @error('jenkel')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="number" name="no_hp" value="{{old('no_hp')}}"  class="form-control @error('no_hp')is-invalid @enderror" placeholder="{{__('Nomor Handphone')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
          @error('no_hp')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="program_studi" value="{{old('program_studi')}}" class="form-control @error('program_studi')is-invalid @enderror" placeholder="{{__('Program Studi')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-graduate"></span>
            </div>
          </div>
          @error('program_studi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="fakultas" value="{{old('fakultas')}}" class="form-control @error('fakultas')is-invalid @enderror" placeholder="{{__('Fakultas')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-university"></span>
            </div>
          </div>
          @error('fakultas')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email')is-invalid @enderror" placeholder="{{__('Email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="{{old('password')}}" class="form-control @error('password')is-invalid @enderror" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <a href="{{route('login')}}" class="text-center">Log In</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin-lte-3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-lte-3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-lte-3/dist/js/adminlte.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('admin-lte-3/plugins/select2/js/select2.full.min.js')}}"></script>

<script>
  $(function () {
  //Initialize Select2 Elements
  $('.select2').select2()
  });
</script>
</body>
</html>
