@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Створення дочірнього пункта меню {{ $parentItem->label }} ({{$getLocaleName}})</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuwidget.index') }}">Віджети</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuitem.index', $menuWidget->id) }}">Пункти меню</a></li>
                            <li class="breadcrumb-item active">Створення дочірнього пункта меню</li>
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
                        <form action="{{route('admin.menu.submenuitem.store')}}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="menu_widget_id" value="{{ $menuWidget->id }}">
                                <input type="hidden" name="parent_id" value="{{$parentItem->id}}">
                            </div>
                            <label>Назва Пункта Меню</label>
                            <div class="form-group">
                                <input type="input" class="form-control" name="label" value="{{ old('label') }}" placeholder="Назва Пункта Меню">
                                @error('label')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <label>URL зовнішньої сторінки</label>
                            <div class="form-group">
                                <input type="input" class="form-control" name="url" value="{{ old('url') }}" placeholder="URL зовнішньої сторінки">
                                @error('url')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>

                            <div class="form-group w-100">
                                <label>Вибрати Тип Пункта Меню</label>
                                <select name="type" class="form-control">
                                    @foreach($menuTypes as $systemName => $name)
                                        <option value="{{ $systemName }}"
                                            {{ old('type') == $systemName ? ' selected' : '' }}
                                        >{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Додати">
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
