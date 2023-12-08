@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-2">Редагування Сторінки ({{$getLocaleName}})</h1>
                    <h5 class="m-0">URI: ({{$page->uri}})</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Сторінки</a></li>
                        <li class="breadcrumb-item active">Редагування Сторінки: {{$page->title}}</li>
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
                    <form action="{{route('admin.pages.update', $page->id)}}" method="POST" class="">
                        @csrf
                        @method('PATCH')
                        <div class="form-group w-25">
                            <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                        </div>

                        <div class="form-group w-25">
                            <label for="exampleInputFile">Meta Keywords</label>
                            <input type="input" class="form-control" name="meta_keywords"
                                   value="{{ $page->meta_keywords }}" placeholder="Meta Keywords">
                            @error('meta_keywords')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Meta Description</label>
                            <textarea id="summernote_m_d" name="meta_description">
                                     {{ $page->meta_description }}
                            </textarea>
                            @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Контент</label>
                            <textarea id="summernote" name="content">
                                     {{ $page->content }}
                                 </textarea>
                            @error('content')
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
<!-- /.content-wrapper -->
@endsection
