@extends('admin.layout.layout')

@section('title') Admin panel main @endsection

@section('content')
    <div class="card col-6 mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Редактирование катеории "{{ $category->title }} "</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action=" {{ route('categories.update', ['category' => $category->id]) }}">
                @csrf
                @method('PUT')
                <div class="card-body ">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                               name="title" value="{{ $category->title }}">
                        <div class="invalid-feedback">
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
