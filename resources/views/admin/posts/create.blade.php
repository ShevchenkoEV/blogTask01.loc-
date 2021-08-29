@extends('admin.layout.layout')

@section('title') Admin panel main @endsection

@section('content')
    <div class="card col-6 mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Новая статья</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <form method="POST" action=" {{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input type="text" class="form-control " id="title"
                               name="title" placeholder="Название" value="{{ old('title') }}">
                    </div>

                    <div class="form-group">
                        <label for="description"> Описание </label>
                        <textarea class="form-control " name="description" id="description" rows="5"
                                  placeholder="Цытата ...">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content"> Контент </label>
                        <textarea class="form-control " name="content" id="content" rows="5"
                                  placeholder="Контент ...">{{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach ($categories as $categoryId => $categoryTitle)
                                <option value="{{ $categoryId }}"> {{ $categoryTitle }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select class="form-control select2" name="tags[]" multiple="multiple" id="tags"
                                data-placeholder="Выбор тегов">
                            @foreach ($tags as $tagId => $tagTitle)
                                <option value="{{ $tagId }}"> {{ $tagTitle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="thumbnail">Изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail"
                                       aria-label="file example">
                                <label class="custom-file-label" for="thumbnail">Выбрать фаил</label>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
@endsection
