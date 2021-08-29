@extends('admin.layout.layout')

@section('title') Admin panel @endsection

@section('content')
    <!-- Default box -->
    <div class="card col-8 mx-4 shadow-lg">
        <div class="card-header">
            <h3 class="card-title">Главная админ панель</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            Тут можно вывести информацию
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
@endsection
