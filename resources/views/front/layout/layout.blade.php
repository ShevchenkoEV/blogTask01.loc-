<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
            rel="stylesheet">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/front/css/front.css') }}">
</head>

<body>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h2>BlogTask01<em>.loc</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.post.create') }}">Создать пост</a>
                        </li>

                    @endauth
                    @if(auth()->check() && auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.index') }}">Admin panel</a>
                        </li>
                    @endif

                </ul>
                <ul class="navbar-nav flex-row flex-wrap ms-md-auto shadow">
                    @auth
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link" href="{{ route('profile')}}">Профиль :: {{ auth()->user()->name}}</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link" href="{{ route('logout')}}">Выход пользователя</a>
                        </li>
                    @else
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link" href="{{ route('register.create') }}">Регистрация</a>
                        </li>
                        <li class="nav-item col-6 col-md-auto">
                            <a class="nav-link" href="{{ route('login.create')}}">Вход пользователя</a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-text">
                    <p>Copyright 2021 Blog Co.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/front/js/front.js') }}"></script>

<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) {                   //declaring the array outside of the
        if (!cleared[t.id]) {                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value = '';         // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>

</body>

</html>
