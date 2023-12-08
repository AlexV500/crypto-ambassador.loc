@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Додавання Категорії ({{$getLocaleName}})</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.category.index') }}">Категорії</a></li>
                        <li class="breadcrumb-item active">Створення Категорії</li>
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
                    <form action="{{route('admin.blog.category.store')}}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <div class="form-group w-25">
                                <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                            </div>
                        </div>
                        <label>Назва категорії</label>
                        <div class="form-group">
                            <input type="input" class="form-control" name="title" value="{{ old('title') }}" placeholder="Назва категорії">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <label>URI</label>
                        <div class="form-group">
                            <input type="input" class="form-control" name="uri" value="{{ old('uri') }}"
                                   placeholder="URI">
                            {{--                            <button onclick="convert()" style="margin-top: 0.5rem;">Covert Now</button>--}}
                            @error('uri')
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
<!-- /.content-wrapper -->
@endsection
