@extends('front.layout.layout')

@section('title', 'Main Page :: Main')

@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Профиль пользователя :</h4>
                            <h2>{{ $user->name }}</h2>

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
                                        <h2>Пользователь : {{ $user->name }}</h2>
                                        <p class="text-start">Статус(бан) : {{ !$user->status ? 'ок' : 'забанен' }}</p>
                                    </div>
                                    <div class="img m-4">
                                        <img src=" {{ $user->getImage() }}" width="500px" alt="">
                                    </div>
                                    <p class="text-start">Имя : {{ $user->name }}</p>
                                    <p class="text-start">E-mail : {{ $user->email }}</p>
                                    <p class="text-start">Аккаунт создан : {{ $user->created_at }}</p>
                                    <p class="text-start">Последний раз обновлял профиль : {{ $user->updated_at }}</p>
                                    <a class="btn btn-warning" href="{{ route('profile.edit', ['id' => $user->id]) }}" role="button">Изменить</a>
                                </div>
                            </div>
                            @include('front.layout._sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection