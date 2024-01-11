<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/dashboard" class="brand-link text-decoration-none">
        <p class="text-center font-weight-light mb-0">SIAKAD</p>
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
                @if(Auth::user()->position === 1)
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
                                <a href="/admin/dosen" class="nav-link {{ Request::is('admin/dosen*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user-tie"></i>
                                    <p>Dosen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/jurusan" class="nav-link {{ Request::is('admin/jurusan*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <p>Jurusan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/ormawa" class="nav-link {{ Request::is('admin/ormawa*') ? 'active' : '' }}">
                                    <i class="fa fa-certificate" aria-hidden="true"></i>
                                    <p>Ormawa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user"></i>
                                    <p>User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/classes" class="nav-link {{ Request::is('admin/classes*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user-graduate"></i>
                                    <p>Kelas</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item">
                        <a href="/admin/students" class="nav-link {{ Request::is('admin/students*') ? 'active' : '' }}">
                            <i class="fa-solid fa-users"></i>
                            <p>Mahasiswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/wali" class="nav-link {{ Request::is('admin/wali*') ? 'active' : '' }}">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            <p>Wali</p>
                        </a>
                    </li>
                    <li class="nav-header">LAPORAN</li>
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
                                <a href="/laporan/dosen" class="nav-link">
                                    <i class="fa-solid fa-user-tie"></i>
                                    <p>Laporan Dosen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/jurusan" class="nav-link">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <p>Laporan Jurusan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/ormawa" class="nav-link">
                                    <i class="fa fa-certificate" aria-hidden="true"></i>
                                    <p>Laporan Ormawa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/laporan/user" class="nav-link">
                                    <i class="fa-solid fa-user"></i>
                                    <p>Laporan User</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-header">POSTS</li>
                <li class="nav-item">
                    <a href="/post" class="nav-link  {{ Request::is('post*') ? 'active' : '' }}">
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
