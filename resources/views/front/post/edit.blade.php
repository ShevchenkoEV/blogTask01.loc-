@extends('pages.layout.layout')

@section('title', 'Main Page :: Main')

@section('content')

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Профиль пользователя :</h4>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, voluptates!</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="contact-us">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="down-contact">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="sidebar-item contact-form">
                                    @include('errors.errors')
                                    <div class="sidebar-heading">
                                        <h2>Lorem ipsum dolor sit amet.</h2>
                                        <p class="text-start">Статус(бан) : {{ !$user->status ? 'ок' : 'забанен' }}</p>
                                    </div>
                                    <div class="img m-4">
                                        <img src=" {{ $user->getImage() }}" width="500px" alt="">
                                    </div>
                                    <div class="content">
                                        <form id="contact"
                                              action=" {{ route('profile.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="name" type="text" id="name" value="{{ $user->name}}">
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6 col-sm-12">
                                                    <fieldset>
                                                        <input name="email" type="text" id="email" value="{{ $user->email}}">
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="password" type="password" id="subject" placeholder="Пароль">
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="password_confirmation" type="password" id="subject" placeholder="Повторите пароль">
                                                    </fieldset>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="avatar" class="form-label">Изменить изображение :</label>
                                                    <input
                                                            class="form-control form-control-sm" id="avatar" type="file" name="avatar">
                                                </div>

                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">
                                                            Сохранить
                                                        </button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @include('pages.sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection