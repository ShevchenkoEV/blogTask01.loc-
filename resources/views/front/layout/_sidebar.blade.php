<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">

            <div class="col-lg-12">
                <div class="sidebar-item search shadow">
                    <form id="search_form" method="GET" action="{{ route('search') }}">
                        <input type="text" name="s" class="searchText @error('s') is-invalid @enderror"
                               placeholder="искать в названии статьи ? ...">
                    </form>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                        <h2>Недавние посты</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($recent_posts as $recent_post)
                                <li><a href="{{ route('post.show', ['slug' => $recent_post->slug]) }}">
                                        <h5>{{ $recent_post->title}}</h5></a>
                                    <span>{{ $recent_post->getPostDate()}}</span>
                                    <span>Просмотров : {{ $recent_post->view }}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                        <h2>Категории</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach ($sidebar_categories as $sidebar_category)
                                <li><a
                                        href="{{ route('category.show', ['slug' => $sidebar_category->slug]) }}">{{ $sidebar_category->title }}
                                        <span>({{ $sidebar_category->posts_count }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Теги</h2>
                    </div>
                    <div class="content">
                        <ul>
                            @foreach($sidebar_tags as $sidebar_tag)
                                <li class="shadow">
                                    <a href="{{ route('tag.show', ['slug'=>$sidebar_tag->slug]) }}">{{ $sidebar_tag->title }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
