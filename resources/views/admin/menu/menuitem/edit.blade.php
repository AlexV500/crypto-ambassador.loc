@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагування пункта меню {{ $menuItem->label }} ({{$getLocaleName}})</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuwidget.index') }}">Віджети</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuitem.index', $menuWidget->id) }}">Пункти меню</a></li>
                            <li class="breadcrumb-item active">Редагування пункта меню</li>
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
                    <div class="col-12">
                        <form action="{{route('admin.menu.menuitem.update', $menuItem->id)}}" method="POST" class="w-25">
                            @csrf
{{--                            <div class="form-group">--}}
{{--                                <input type="hidden" name="menu_widget_id" value="{{ $menuWidget->id }}">--}}
{{--                            </div>--}}
                            <label>Назва Пункта Меню</label>
                            <div class="form-group">
                                <input type="input" class="form-control" name="label" value="{{ $menuItem->label }}" placeholder="Назва Меню Віджета">
                                @error('label')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <label>URL зовнішньої сторінки</label>
                            <div class="form-group">
                                <input type="input" class="form-control" name="url" value="{{ $menuItem->url }}" placeholder="URL зовнішньої сторінки">
                                @error('url')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>

                            <div class="form-group w-100">
                                <label>Вибрати Тип Пункта Меню</label>
                                <select name="type" class="form-control">

                                    @foreach($menuTypes as $systemName => $name)
                                        <option value="{{ $systemName }}"
                                            {{ $menuItem->type == $systemName ? ' selected' : '' }}
                                        >{{ $name }}</option>
                                    @endforeach

                                </select>
                                @error('type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Змінити">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
