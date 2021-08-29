@extends('front.layout.layout')


@section('title', 'Categories :: index')

@section('content')

    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Поиск в названии : </h4>
                            <h4>" {{ $s }} "</h4>
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
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <a href="{{route('post.show', ['slug' => $post->slug])}}">
                                                <img src="{{ $post->getImage() }}" alt="">
                                            </a>
                                        </div>
                                        <div class="down-content">
                                            <a href="{{ route('category.show', ['slug' => $post->category->slug]) }}">
                                                <span>{{ $post->category->title}}</span></a>
                                            <a href=" {{ route('post.show', ['slug' => $post->slug]) }}">
                                                <h4>{{ $post->title}}</h4>
                                            </a>
                                            <ul class="post-info">
                                                <li>{{ $post->author->name }}</li>
                                                <li>{{ $post->getPostDate()}}</li>
                                                <li>{{ $post->comments->count() }} Comments</li>
                                            </ul>
                                            <p>{{ $post->description}}</p>
                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="post-tags">
                                                            @if ($post->tags->count())
                                                                <li><i class="fa fa-tags"></i></li>
                                                                @foreach ($post->tags as $tag)
                                                                    <li>
                                                                        <a href="{{ route('tag.show', ['slug' => $tag->slug])}}">{{ $tag->title}}</a>
                                                                    </li>
                                                                @endforeach
                                                            @endif

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-12">
                                {{ $posts->appends(['s'=>request()->s])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                @include('front.layout._sidebar')
            </div>
        </div>
    </section>
@endsection
