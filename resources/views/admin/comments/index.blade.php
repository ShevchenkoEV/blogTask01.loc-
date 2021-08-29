@extends('admin.layout.layout')

@section('title', 'Admin panel main :: Comments')

@section('content')
    <div class="card mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Список комментариев</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">
            <div class="col-2">
                {{--                <a href=" {{ route('tags.create') }}" class="btn btn-block btn-outline-primary mb-3"> Добавить--}}
                {{--                    тег</a>--}}
            </div>

            @if (count($comments) > 0)
                <div class="table-responsive">
                    {{-- <table class="table table-bordered"> --}}
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Название</th>
                            <th>автор</th>
                            <th>к посту</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->author->name }}</td>
                                <td>{{ $comment->post->title }}</td>
                                <td>
                                    @if($comment->status == 1)
                                        <a href="{{ route('admin.comments.toggle',['id' => $comment->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-lock"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.comments.toggle',['id' => $comment->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="far fa-thumbs-up"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('admin.comment.destroy', ['id' => $comment->id]) }}"
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
                <h3> Теги отсутствуют</h3>
            @endif

        </div>
        <!-- /.card-body -->
    {{--        <div class="card-footer">--}}
    {{--            {{ $tags->links() }}--}}
    {{--            <p>Количество записей: {{ count($tags) > 0 ? count($tags) : 0}}</p>--}}
    {{--        </div>--}}
    <!-- /.card-footer-->
    </div>
@endsection
