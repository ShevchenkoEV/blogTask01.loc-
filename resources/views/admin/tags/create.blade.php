@extends('admin.layout.layout')

@section('title') Admin panel main @endsection

@section('content')
    <div class="card col-6 mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Создание тега</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">

            <form method="POST" action=" {{ route('tags.store') }}">
                @csrf
                <div class="card-body ">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                               name="title" placeholder="Название">
                        <div class="invalid-feedback with-errors">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
@endsection
