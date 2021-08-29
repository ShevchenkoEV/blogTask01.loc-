@extends('front.layout.layout')

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
                            <h4>Создать :</h4>
                            <h2>Пост</h2>
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
                                    <div class="content">
                                        <form id="contact"
                                              action=" {{ route('user.store.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <label for="title"><h4>Название поста</h4></label>
                                                        <input name="title" type="text" id="title" value="{{ old('title') }}" placeholder="Название">
                                                    </fieldset>
                                                </div>

                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <label for="description"><h4>Описание</h4></label>
                                                        <textarea name="description" id="description" placeholder="Описание поста" > {{ old('description') }}</textarea>
                                                    </fieldset>
                                                </div>

                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <label for="content"><h4>Пост</h4></label>
                                                        <textarea name="content" rows="6" id="content" placeholder="Сам пост"> {{ old('content') }}</textarea>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-12 col-sm-12 mb-4">
                                                    <fieldset>
                                                        <select class="form-control" id="category_id" name="category_id">
                                                            @foreach ($categories as $categoryId => $categoryTitle)
                                                                <option value="{{ $categoryId }}"> {{ $categoryTitle }} </option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-12 col-sm-12 mb-4" >
                                                    <label for="tags">Теги</label>
                                                    <select class="form-control select2" name="tags[]" multiple="multiple" id="tags"
                                                            data-placeholder="Выбор тегов">
                                                        @foreach ($tags as $tagId => $tagTitle)
                                                            <option value="{{ $tagId }}"> {{ $tagTitle }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="thumbnail" class="form-label">Изображение :</label>
                                                    <input class="form-control form-control-sm" id="thumbnail" type="file" name="thumbnail">
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
                            @include('front.layout._sidebar')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection