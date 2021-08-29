@extends('admin.layout.layout')

@section('title') Admin panel :: Users @endsection

@section('content')
    <div class="card mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title"> Список пользователей</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">
            <div class="col-2">
                <a href=" {{ route('users.create') }}" class="btn btn-block btn-outline-primary mb-3"> Добавить
                    пользователя</a>
            </div>

            @if (count($users) > 0)
                <div class="table-responsive">
                    {{-- <table class="table table-bordered"> --}}
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>Имя</th>
                            <th>email</th>
                            <th>is_admin</th>
                            <th>статус</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->is_admin == 1 ? 'admin': 'user' }}</td>
                                <td>{{ $user->status == 1 ? 'забанен' : 'разбанен' }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                       class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
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
                <h3> Users отсутствуют</h3>
            @endif

        </div>
        <div class="card-footer">
            {{ $users->links() }}
            <p>Количество записей: {{ count($users) > 0 ? count($users) : 0}}</p>
        </div>
    </div>
@endsection
