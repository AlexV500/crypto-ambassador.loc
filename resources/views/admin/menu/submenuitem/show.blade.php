@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-3">Дочірній пункт меню "{{$menuItem->label}}" меню "{{ $parentItem->label }}" ({{$getLocaleName}})</h1>
                    <a href="{{route('admin.menu.submenuitem.edit', [$menuWidget->id, $menuItem->id])}}" class="text-success mr-3"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{route('admin.menu.submenuitem.delete', [$menuWidget->id, $menuItem->id])}}" method="POST" class="mb-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fas fa-trash text-danger" role="button"></i>
                        </button>
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuwidget.index') }}">Віджети меню</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.menu.submenuitem.index', [$menuWidget->id, $menuItem->id]) }}">Пункти меню</a></li>
                        <li class="breadcrumb-item active">{{$menuItem->label}}</li>
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
                <div class="col-6">
                    <div class="card">

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>Віджет Меню</td>
                                    <td>{{$menuWidget->name}}</td>
                                </tr>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$menuItem->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Назва</td>
                                        <td>{{$menuItem->label}}</td>
                                    </tr>
                                    <tr>
                                        <td>URL</td>
                                        <td>{{$menuItem->url}}</td>
                                    </tr>
                                    <tr>
                                        <td>Позиція</td>
                                        <td>{{$menuItem->position}}</td>
                                    </tr>
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
<!-- /.content-wrapper -->
@endsection
