<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Регистрация пользоваателя</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- CSS -->
    <link rel="stylesheet" href=" {{ asset('assets/admin/css/admin.css') }}">

</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        Регистрация
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Регистрация нового пользоваателя</p>

            @include('errors.errors')

            <form action="{{ route('register')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email')}}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Повторите пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 offset-2">
                        <button type="submit" class="btn btn-primary btn-block">Регистрация</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mt-3">
                <a href="{{ route('home') }}" class="text-center">На главную</a>
            </p>
            <p class="mt-3">
                <a href="{{ route('login.create') }}" class="text-center">Я уже зарегистрирован</a>
            </p>

        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- JS -->
{{-- <script src="{{ asset('assets/admin/js/admin.js') }}"></script> --}}
</body>
</html>


