@extends('admin.layout.layout')

@section('title') Admin panel :: Posts @endsection

@section('content')
    <!-- Default box -->
    <div class="card mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Список постов</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">
            <div class="col-2">
                <a href=" {{ route('posts.create') }}" class="btn btn-block btn-outline-primary mb-3"> Добавить
                    пост</a>
            </div>

            @if (count($posts) > 0)
                <div class="table-responsive">
                    {{-- <table class="table table-bordered"> --}}
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Название</th>
                            <th>Автор</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Картинка</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                                <td>
                                    <img src="{{ $post->getImage() }}" width=100" alt="img">
                                </td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                       class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}"
                                          method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Подтвердите удаление')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            @else
                <h3> Посты отсутствуют</h3>
            @endif

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{ $posts->links() }}
            <p>Количество записей: {{ count($posts) > 0 ? count($posts) : 0}}</p>
            {{-- <p>Количество записей: {{ 111}}</p> --}}
        </div>
        <!-- /.card-footer-->
    </div>
@endsection
