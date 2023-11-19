<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/dashboard" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <div class="user-panel mt-1">
            <div class="image">
                <img src="/img/avatar5.png" class="img-circle " alt="User Image">
            </div>
        </div>
        <li class="nav-item dropdown mt-0">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <p class="fw-semibold">
                    {{ auth()->user()->name }}
                </p>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                <a href="/dashboard" class="text-decoration-none text-dark dropdown-item">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Logout
                    </button>
                </form>
            </div>
        </li>

        <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin LP3I
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a href="/logout" class="dropdown-item">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        Logout
                    </a>
                </div>
            </li> -->
    </ul>
</nav>