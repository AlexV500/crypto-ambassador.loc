@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Додавання Сторінки ({{$getLocaleName}})</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Сніпети</a></li>
                        <li class="breadcrumb-item active">Створення Сніпета</li>
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
                    <form action="{{route('admin.pages.store')}}" method="POST">
                        @csrf
                        <div class="form-group w-25">
                            <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Назва Сніпета</label>
                            <input type="input" class="form-control" name="title" value="{{ old('title') }}" placeholder="Назва Сніпета">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">URI</label>
                            <input type="input" class="form-control" name="system_name" value="{{ old('system_name') }}" placeholder="URI">
                            @error('uri')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Meta Keywords</label>
                            <input type="input" class="form-control" name="meta_keywords"
                                   value="{{ old('meta_keywords') }}" placeholder="Meta Keywords">
                            @error('meta_keywords')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Meta Description</label>
                            <textarea id="summernote_m_d" name="meta_description">
                                     {{ old('meta_description') }}
                            </textarea>
                            @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Контент</label>
                            <textarea id="summernote" name="content">
                                     {{ old('content') }}
                                 </textarea>
                            @error('content')
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
