<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin-lte-3/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Tugas Akhir</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 pb-0 mb-0 d-flex">
        <div class="image mt-2">
          <img src="{{asset('admin-lte-3/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="mt-0 d-block">{{ auth()->user()->name }}</a>
          <p class="mt-0 text-white d-block">{{ auth()->user()->username }}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('/dashboard')}}" class="nav-link {{ $title=='Dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (auth()->user()->level=="admin")
            <li class="nav-item">
              <a href="{{route('/dosen')}}" class="nav-link {{ $title=='Dosen' ? 'active' : '' }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                  Dosen
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('/mahasiswa')}}" class="nav-link {{ $title=='Mahasiswa' ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-graduate"></i>
                <p>
                  Mahasiswa
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link {{ ($title=='Mahasiswa Judul' || $title=='Dosen Input Judul') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Monitoring
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('mahasiswa/judul')}}" class="nav-link {{ $title=='Mahasiswa Judul' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mahasiswa Judul</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('dosen/judul')}}" class="nav-link {{ $title=='Dosen Input Judul' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dosen Input Judul</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link {{ ($title=='Akun Mahasiswa' || $title=='Akun Dosen') ? 'active' : '' }}">
                <i class="fa fa-users nav-icon"></i>
                <p>
                  Akun
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('akun/mahasiswa')}}" class="nav-link {{ $title=='Akun Mahasiswa' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Akun Mahasiswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('akun/dosen')}}" class="nav-link {{ $title=='Akun Dosen' ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Akun Dosen</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          @if (auth()->user()->level=="dosen")
            <li class="nav-item">
              <a href="{{route('input-judul')}}" class="nav-link {{ $title=='Input Judul' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Input Judul
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('status-judul')}}" class="nav-link {{ $title=='Status Judul' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Status Judul
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('revisi')}}" class="nav-link {{ $title=='Revisi' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Revisi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('pelaksanaan-sidang')}}" class="nav-link {{ $title=='Pelaksanaan Sidang' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Pelaksanaan Sidang
                </p>
              </a>
            </li>
          @endif
          @if (auth()->user()->level=="dosen_penguji")
            <li class="nav-item">
              <a href="{{route('penguji')}}" class="nav-link {{ $title=='Pelaksanaan Sidang' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Pelaksanaan Sidang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lihat-hasil-sidang')}}" class="nav-link {{ $title=='Hasil Sidang' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Lihat Hasil Sidang
                </p>
              </a>
            </li>
          @endif
          @if (auth()->user()->level=="dosen_fungsional")
            <li class="nav-item">
              <a href="{{route('jadwal-sidang')}}" class="nav-link {{ $title=='Pelaksanaan Sidang' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Pelaksanaan Sidang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lihat-jadwal-sidang')}}" class="nav-link {{ $title=='Jadwal Sidang' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Lihat Jadwal Sidang
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lihat-hasil-sidang')}}" class="nav-link {{ $title=='Hasil Sidang' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Lihat Hasil Sidang
                </p>
              </a>
            </li>
          @endif
          @if (auth()->user()->level=="mahasiswa")
            <li class="nav-item">
              <a href="{{route('pilih-judul')}}" class="nav-link {{ $title=='Pilih Judul' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Pilih Judul
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('status')}}" class="nav-link {{ $title=='Status' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Status
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lihat-revisi')}}" class="nav-link {{ $title=='Lihat Revisi' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Lihat Revisi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('hasil-sidang-mahasiswa')}}" class="nav-link {{ $title=='Hasil Sidang' ? 'active' : '' }}">
                <i class="nav-icon far fa-circle nav-icon"></i>
                <p>
                  Hasil Sidang
                </p>
              </a>
            </li>
          @endif
          
          <li class="nav-item">
            <a onclick="
              event.preventDefault();
              document.getElementById('logout').submit();" href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log out
              </p>
            </a>
            <form id="logout" action="{{route('logout')}}" method="post" class="d-inline border-0">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>