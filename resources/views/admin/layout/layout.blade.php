<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href=" {{ asset('assets/admin/css/admin.css') }}">

</head>

<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>
    </nav>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ url('/') }}" target="_blank" class="brand-link">
            <span class="brand-text font-weight-light ml-2">Главная страница</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ $userCheck->getImage() }}"
                         class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ $userCheck->name }}</a>
                </div>
            </div>

        <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная admin panel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>Посты</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-archive"></i>
                            <p>Категории</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('tags.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-tag"></i>
                            <p>Теги</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.comments.index') }}" class="nav-link">
                            <i class="nav-icon far fa-comments"></i>
                            <p>Комменарий<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ml-1"> {{$newCommentsCount}} </span></p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <section class="content pt-4">
                @include('errors.errors')

                @yield('content')
        </section>
    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2021 Admin panel</strong> All rights reserved.
    </footer>
</div>

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

</body>

</html>
