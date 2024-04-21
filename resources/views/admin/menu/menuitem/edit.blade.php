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
                            @method('PATCH')
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

                            <div class="form-group w-100">
                                <label>Вибрати Тип Пункта Меню</label>
                                <select name="menu_item_type" class="form-control">

                                    @foreach($menuItemTypes as $systemItemTypeName => $itemTypeName)
                                        <option value="{{ $systemItemTypeName }}"
                                            {{ $menuItem->menu_item_type == $systemItemTypeName ? ' selected' : '' }}
                                        >{{ $itemTypeName }}</option>
                                    @endforeach

                                </select>
                                @error('type')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>

                            <div class="form-group w-100">
                                <label>Вибрати Прив'язку Пункта Меню</label>
                                <select name="menu_item_bind_type" class="form-control">

                                    @foreach($menuBindItemTypes as $systemBindItemTypeName => $bindItemTypeName)
                                        <option value="{{ $systemBindItemTypeName }}"
                                            {{ $menuItem->menu_item_bind_type == $systemBindItemTypeName ? ' selected' : '' }}
                                        >{{ $bindItemTypeName }}</option>
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
