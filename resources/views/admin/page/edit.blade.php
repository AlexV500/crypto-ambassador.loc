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
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.page.index') }}">Сторінки</a></li>
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
                <div class="col-10">
                    <form action="{{route('admin.page.update', $page->id)}}" method="POST" enctype="multipart/form-data" class="">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                        <input type="hidden" name="original_content_id" value="{{ $page->original_content_id }}">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Назва</label>
                                <input type="input" class="form-control" name="title" value="{{ $page->title }}"
                                       placeholder="Назва поста">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">URI</label>
                                <input type="input" class="form-control" name="uri" value="{{ $page->uri }}"
                                       placeholder="URI">
                                @error('uri')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Meta Keywords</label>
                            <input type="input" class="form-control" name="meta_keywords"
                                   value="{{ $page->meta_keywords }}" placeholder="Meta Keywords">
                            @error('meta_keywords')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Meta Description</label>
                            <textarea id="summernote_m_d" name="meta_description">
                                     {{ $page->meta_description }}
                            </textarea>
                            @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Контент</label>
                            <textarea id="summernote" name="content">
                                     {{ $page->content }}
                                 </textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <input type="file" id="input-file-now-custom-3" class="form-control" name="images[]" multiple>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="published" name="published" value="1" @if($page->published == '1') checked="" @endif>
                                <label class="form-check-label">Опубліковано</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="published" value="0" @if($page->published == '0') checked="" @endif>
                                <label class="form-check-label">Не опубліковано</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Змінити">
                        </div>
                    </form>
                    <livewire:admin.media.images.images-gallery :siteEntity="$siteEntity"
                                                                :imageFolder="$page->original_content_id"
                                                                :mainImageShowStatus="$mainImageShowStatus"
                    />
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
