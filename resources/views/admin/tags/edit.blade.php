@extends('admin.layout.layout')

@section('title') Admin panel main @endsection

@section('content')
    <div class="card col-6 mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Редактирование тега "{{ $tag->title }} "</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action=" {{ route('tags.update', ['tag' => $tag->id]) }}">
                @csrf
                @method('PUT')
                <div class="card-body ">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                               name="title" value="{{ $tag->title }}">
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
    <!-- /.card -->

@endsection

