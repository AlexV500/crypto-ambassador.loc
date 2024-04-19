@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Меню ({{$getLocaleName}})</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuwidget.index') }}">Віджети</a></li>
                            <li class="breadcrumb-item active">Пункти меню</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{route('admin.menu.menuwidget.create')}}" class="btn btn-block btn-primary">Додати</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-10">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="50%">Назва</th>
                                        <th width="35%">Позиція</th>
                                        <th width="10%" colspan="4" class="text-center">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menuWigets as $menuWiget)
                                        <tr>
                                            <td>{{$menuWiget->id}}</td>
                                            <td>{{$menuWiget->name}}</td>
                                            <td>{{$positions[$menuWiget->position]['name']}}</td>
                                            <td class="text-center"><a href="{{route('admin.menu.menuitem.index', $menuWiget->id)}}" class="text-secondary"><i class="fa-solid fa-bars"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.menu.menuwidget.show', $menuWiget->id)}}"><i class="far fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.menu.menuwidget.edit', $menuWiget->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{route('admin.menu.menuwidget.delete', $menuWiget->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
