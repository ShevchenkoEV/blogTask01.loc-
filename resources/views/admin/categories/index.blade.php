@extends('admin.layout.layout')

@section('title') Admin panel :: category @endsection

@section('content')
    <div class="card mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Список катеорий</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">
            <div class="col-2">
                <a href=" {{ route('categories.create') }}" class="btn btn-block btn-outline-primary mb-3">
                    Добавить
                    категорию</a>
            </div>

            @if (count($categories) > 0)
                <div class="table-responsive">
                    {{-- <table class="table table-bordered"> --}}
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Название</th>
                            <th>slug</th>
                            <th>связи с постами</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->slug }}</td>
                                {{--                                <td>@dd( $category->posts->pluck('id'))</td>--}}
                                {{--                                <td>{{$category->getArr($category->posts,'id')}}</td>--}}
                                <td>
                                    @foreach($category->posts as $post)
                                        {{$post->title}}
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                       class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form
                                        action="{{ route('categories.destroy', ['category' => $category->id]) }}"
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
                <h3> Категорий отсутствуют</h3>
            @endif

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            {{ $categories->links() }}
            <p>Количество записей: {{ count($categories) > 0 ? count($categories) : 0}}</p>
        </div>
    </div>
@endsection
