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
                        <li class="breadcrumb-item"><a href="{{ route('admin.page.index') }}">Сторінки</a></li>
                        <li class="breadcrumb-item active">Створення Сторінки</li>
                    </ol>
                </div><!-- /.col -->
                @if($originalContentTitle !== "")
                    <div class="col-sm-6">
                        <h5 class="m-0">Пост оригіналу: ({{$originalContentTitle}})</h5>
                    </div><!-- /.col -->
                @endif
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
                    <form action="{{route('admin.page.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                            <input type="hidden" name="original_content_id" value="{{ $originalContentId }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">Назва Сторінки</label>
                                <input type="input" onchange="transliterateURI(this.value)" class="form-control" name="title" value="{{ old('title') }}"
                                       placeholder="Назва Сторінки">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputFile">URI</label>
                                <input type="input" id="uri-form-input" class="form-control" name="uri"
                                       value="{{ old('uri') }}" placeholder="URI">
                                @error('uri')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Meta Keywords</label>
                            <input type="input" class="form-control" name="meta_keywords"
                                   value="{{ old('meta_keywords') }}" placeholder="Meta Keywords">
                            @error('meta_keywords')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Meta Description</label>
                            <textarea id="summernote_m_d" name="meta_description">
                                     {{ old('meta_description') }}
                            </textarea>
                            @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Контент</label>
                            <textarea id="summernote" name="content">
                                     {{ old('content') }}
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
                                <input class="form-check-input" type="checkbox" name="published" value="1" checked="">
                                <label class="form-check-label">Опублікувати</label>
                            </div>
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Додати">
                        </div>
                    </form>
                    <livewire:admin.media.images.images-gallery :siteEntity="$siteEntity"
                                                                :imageFolder="$originalContentId"
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

<script src="{{asset('assets/js/transliterateURI.js')}}"></script>

@endsection
