@extends('admin.layouts.main')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Прив'язка пункта меню {{ $menuItem->label }} ({{$getLocaleName}})</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuwidget.index') }}">Віджети</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.menu.menuitem.index', $menuWidget->id) }}">Пункти меню</a></li>
                            <li class="breadcrumb-item active">Прив'язка пункта меню</li>
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
                        <h5>Назва Меню: {{ $menuItem->label }}</h5>
                        <h5>Прив'язка Пункта Меню: {{ $menuBindType }}</h5>
                        <hr>
                            @if($menuItem->menu_item_bind_type == 'menuItemExternalLink')
                                <x-external-url :menuItemId="$menuItem->id"></x-external-url>
                            @endif
                        @if($menuItem->menu_item_bind_type == 'menuItemBlogPost')
                            <livewire:admin.menu.menu-item-blog-post :siteEntity="$siteEntity" :menuItem="$menuItem"/>
                        @endif
                        @if($menuItem->menu_item_bind_type == 'menuItemPage')
                            <livewire:admin.menu.menu-item-page :siteEntity="$siteEntity" :menuItem="$menuItem"/>
                        @endif

                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

