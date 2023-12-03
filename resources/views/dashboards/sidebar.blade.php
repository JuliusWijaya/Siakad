<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link text-decoration-none">
        <img src="{{ asset('/dist/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-5" style="opacity: .8">
        <span class="brand-text font-weight-light">Politeknik LP3I</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if(auth()->user()->position === 1)
                    <li class="nav-header">PAGES</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <p>
                                Data Master
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/dosen" class="nav-link {{ Request::is('/admin/dosen*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user-tie"></i>
                                    <p>Dosen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/jurusan" class="nav-link {{ Request::is('jurusan*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <p>Jurusan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/classes" class="nav-link {{ Request::is('classes*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user-graduate"></i>
                                    <p>Kelas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/students" class="nav-link {{ Request::is('students*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-users"></i>
                                    <p>Mahasiswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/ormawa" class="nav-link {{ Request::is('ormawa*') ? 'active' : '' }}">
                                    <i class="fa fa-certificate" aria-hidden="true"></i>
                                    <p>Ormawa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/wali" class="nav-link {{ Request::is('wali*') ? 'active' : '' }}">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    <p>Wali</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/user" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user"></i>
                                    <p>User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/post" class="nav-link {{ Request::is('post*') ? 'active' : '' }}">
                        <i class="fa-solid fa-file-export"></i>
                        <p>
                            Post
                        </p>
                    </a>
                </li>
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
