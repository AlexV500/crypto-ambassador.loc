@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Дочірні пункти меню "{{ $parentItem->label }}" ({{$getLocaleName}})</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuwidget.index') }}">Віджети меню</a></li>
                            @php $title = 'Дочірні пункти меню' @endphp
                            <x-menu-breadcrumbs :menuBreadcrumbs="$menuBreadcrumbs" :menuWidget="$menuWidget" :menuItem="$parentItem" :title="$title"></x-menu-breadcrumbs>
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
                        <a href="{{route('admin.menu.submenuitem.create', [$menuWidget->id, $parentItem->id])}}" class="btn btn-block btn-primary">Додати</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th width="4%">ID</th>
                                        <th width="27%">Назва</th>
                                        <th width="39%">URL</th>
                                        <th width="13%">Прив`язка</th>
                                        <th width="6%"  colspan="3" class="text-center">Позиція</th>
                                        <th width="1%"></th>
                                        <th width="10%" colspan="6" class="text-center">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menuItems as $menuItem)
                                        <tr>
                                            <td>{{$menuItem->id}}</td>
                                            <td>{{$menuItem->label}}</td>
                                            <td>{{$menuItem->url}}</td>
                                            <td>{{$subMenuItemBindType[$menuItem->menu_item_bind_type]}}</td>
                                            <td>{{$menuItem->position}}</td>

                                            <td class="text-center"><a href="{{route('admin.menu.submenuitem.positionUp', [$menuWidget->id, $menuItem->id])}}" title="Підняти на одну позицію вверх" class="text-info"><i class="fa-solid fa-up-long"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.menu.submenuitem.positionDown', [$menuWidget->id, $menuItem->id])}}" title="Опустити на одну позицію вниз" class="text-info"><i class="fa-solid fa-down-long"></i></a></td>
                                            <td></td>
                                            @if(($menuItem->type !== 'menuColumnItem') or ($menuItem->type !== 'menuColumnlink'))
                                                <td class="text-center"><a href="{{route('admin.menu.submenuitem.index', [$menuWidget->id, $menuItem->id])}}" title="Дочірні пункти меню" class="text-secondary"><i class="fa-solid fa-bars-staggered"></i></a></td>
                                            @endif
{{--                                            @if(($menuItem->type == 'menuColumnItem') or ($menuItem->type == 'menuColumnlink'))--}}
{{--                                                <td class="text-center"><a href="" title="Дочірні пункти меню" class="text-secondary"><i class="fa-solid fa-table-columns"></i></a></td>--}}
{{--                                            @endif--}}
                                            <td class="text-center"><a href="{{route('admin.menu.submenuitem.binding', [$menuWidget->id, $menuItem->id])}}" title="Прив'язка меню" class="text-secondary"><i class="fa-solid fa-indent"></i></a></td>
                                            @if($menuItem->published == '1')
                                                <td class="text-center"><a href="{{route('admin.menu.submenuitem.visible', [$menuWidget->id, $menuItem->id])}}" title="Пункт меню видимий" class="text-success"><i class="fa-solid fa-toggle-on"></i></a></td>
                                            @endif
                                            @if($menuItem->published == '0')
                                                <td class="text-center"><a href="{{route('admin.menu.submenuitem.visible', [$menuWidget->id, $menuItem->id])}}" title="Пункт меню не видимий" class="text-secondary"><i class="fa-solid fa-toggle-off"></i></a></td>
                                            @endif
                                            <td class="text-center"><a href="{{route('admin.menu.submenuitem.show', [$menuWidget->id, $menuItem->id])}}" title="Переглянути"><i class="far fa-eye"></i></a></td>
                                            <td class="text-center"><a href="{{route('admin.menu.submenuitem.edit', [$menuWidget->id, $menuItem->id])}}" title="Редагувати" class="text-info"><i class="fas fa-pencil-alt"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{route('admin.menu.submenuitem.delete', $menuItem->id)}}" method="POST">
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
