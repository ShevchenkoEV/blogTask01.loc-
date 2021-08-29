@extends('front.layout.layout')

@section('title', 'Main Page :: Main')

@section('content')


<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid shadow-lg">
        <div class="owl-banner owl-carousel">
            @foreach($posts as $post)
            <div class="item shadow-lg">
                <img src=" {{ $post->getImage() }}" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <a href="{{ route('category.show', ['slug' => $post->category->slug]) }}">
                            <span>{{ $post->category->title }}</span></a>
                        </div>
                        <a href="{{ route('post.show', ['slug' => $post->slug]) }}">
                            <h4>{{ $post->title }}</h4>
                        </a>
                        <ul class="post-info">
                            <li>{{$post->author->name}}</li>
                            <li>{{$post->getPostDate()}}</li>
                            <li>{{ $post->comments->count() }} Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<section class="blog-posts">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @include('errors.errors')
                <div class="all-blog-posts">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-lg-12 mt-2">
                            <div class="blog-post shadow-lg">
                                <div class="blog-thumb">
                                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}">
                                        <img src=" {{ $post->getImage() }}" alt="">
                                    </a>
                                </div>
                                <div class="down-content">
                                    <span>
                                        <a class="fa fa-list-alt"
                                            href=" {{ route('category.show', ['slug' => $post->category->slug]) }}">
                                            {{ $post->category->title }}</a>
                                    </span>
                                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}">
                                        <h4> " {{$post->title}} "</h4>
                                    </a>
                                    <ul class="post-info">
                                        <li> Автор : {{ $post->author->name }}</li>
                                        <li>{{ $post->getPostDate() }}</li>
                                        <li>Просмотров : {{ $post->view }}</li>
                                        <li>{{ $post->comments->count() }} Comments</li>
                                    </ul>
                                    <p>{{ $post->description }}</p>
                                    <div class="post-options">
                                        <div class="row">
                                            <div class="col-6">
                                                <ul class="post-tags">
                                                    @if ($post->tags->count())
                                                    <li><i class="fa fa-tags"></i></li>
                                                    @foreach($post->tags as $tag)
                                                    <li>
                                                        <a
                                                            href="{{ route('tag.show', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
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
                        <div class="col-lg-12 mt-3">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @include('front.layout._sidebar')
        </div>
    </div>
</section>



@endsection
