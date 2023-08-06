<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        <img src="/img/1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-5" style="opacity: .8">
        <span class="brand-text font-weight-light">Politeknik LP3I</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/dashboard" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                =
                <li class="nav-item menu-open">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">PAGES</li>
                <li class="nav-item">
                    <a href="/jurusan" class="nav-link {{ Request::is('jurusan*') ? 'active' : '' }}">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <p>
                            Jurusan
                        </p>
                    </a>
                </li>
                @if(auth()->user()->position == 1)
                <li class="nav-item">
                    <a href="/mahasiswa" class="nav-link {{ Request::is('mahasiswa*') ? 'active' : '' }}">
                        <i class="fa-solid fa-users"></i>
                        <p>
                            Mahasiswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kelas" class="nav-link {{ Request::is('kelas*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-graduate"></i>
                        <p>
                            Kelas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/ormawa" class="nav-link {{ Request::is('ormawa*') ? 'active' : '' }}">
                        <i class="fa-solid fa-certificate"></i>
                        <p>
                            Ormawa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/wali" class="nav-link {{ Request::is('wali*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user"></i>
                        <p>
                            Wali
                        </p>
                    </a>
                </li>
             
                <li class="nav-item">
                    <a href="/dosen" class="nav-link {{ Request::is('dosen*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-tie"></i>
                        <p>
                            Dosen
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-gear"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">SETTINGS</li>
                <li class="nav-item">
                    <a href="/password" class="nav-link">
                        <i class="fa-solid fa-key"></i>
                        <p>
                            Change Password
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>