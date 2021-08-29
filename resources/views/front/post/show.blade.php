@extends('front.layout.layout')

@section('title', $post->title . ' :: статья')

@section('content')

    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>
                                <a href="{{ route('category.show', ['slug' => $post->category->slug]) }}">
                                    Категория :: {{ $post->category->title }}
                                </a>
                            </h4>
                            <h4>Название поста : " {{ $post->title }} "</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        @include('errors.errors')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src=" {{ $post->getImage() }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>
                                        <a href="{{ route('category.show', ['slug' => $post->category->slug]) }}">
                                            {{ $post->category->title }}
                                        </a>
                                    </span>
                                        <a href="post-details.html">
                                            <h4>" {{ $post->title }} "</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li> Автор : {{ $post->author->name }}</a></li>
                                            <li>{{ $post->getPostDate() }}</li>
                                            <li>Просмотров : {{ $post->view }}</li>
                                            <li>{{ $post->comments->count() }} Comments</li>
                                        </ul>
                                        <p>{{ $post->content }}</p>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                @if($post->comments->count()>0)
                                <div class="sidebar-item comments">
                                    <div class="content">
                                        <ul>
                                            @foreach($post->getComments() as $comment)
                                            <li class="col-12 mt-4">
                                                <div class="author-thumb">
                                                    <img src="{{ $comment->author->getImage() }}" width="100" alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>{{ $comment->author->name }}<span>{{ $comment->created_at->diffForHumans() }}</span></h4>
                                                    <p>{{ $comment->content }}</p>
                                                </div>
                                            </li>
{{--                                            <li class="replied">--}}
{{--                                                <div class="author-thumb">--}}
{{--                                                    <img src="assets/images/comment-author-02.jpg" alt="">--}}
{{--                                                </div>--}}
{{--                                                <div class="right-content">--}}
{{--                                                    <h4>Thirteen Man<span>May 20, 2020</span></h4>--}}
{{--                                                    <p>In porta urna sed venenatis sollicitudin. Praesent urna sem, pulvinar vel mattis eget.</p>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>

                            <div class="col-lg-12">
                                <div class="sidebar-item submit-comment">
                                    <div class="sidebar-heading">
                                        <h2>Ваш Коментарий</h2>
                                    </div>
                                    <div class="content">
                                        <form id="comment" action=" {{ route('comment.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                    <textarea name="message" rows="6" id="message"
                                                              placeholder="Ваш комментарий" required=""></textarea>
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-12">
                                                    <fieldset>
                                                        <button type="submit" id="form-submit" class="main-button">
                                                            Отправить
                                                        </button>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('front.layout._sidebar')

            </div>
        </div>
    </section>

@endsection
