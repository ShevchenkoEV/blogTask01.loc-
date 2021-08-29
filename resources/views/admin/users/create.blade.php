@extends('admin.layout.layout')

@section('title') Admin panel main @endsection

@section('content')
    <div class="card col-6 mx-4 card-primary card-outline shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Новый пользаватель</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <form method="POST" action=" {{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="text" class="form-control " id="name"
                               name="name" placeholder="Имя" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" class="form-control " id="email"
                               name="email" placeholder="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control " id="password"
                               name="password" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <label for="password">Повторите пароль</label>
                        <input type="password" class="form-control " id="password_confirmation"
                               name="password_confirmation" placeholder="Повторите пароль">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input custom-control-input-danger custom-control-input-outline"
                                   type="checkbox" id="checkbox" name="status" value="1">
                            <label for="checkbox" class="custom-control-label">Статус (бан)</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Аватар</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="avatar" name="avatar"
                                       aria-label="file example">
                                <label class="custom-file-label" for="avatar">Выбрать фаил</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
@endsection
