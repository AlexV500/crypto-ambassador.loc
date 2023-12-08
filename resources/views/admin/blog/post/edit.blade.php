@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагування Поста ({{$getLocaleName}})</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.post.index') }}">Пости</a></li>
                        <li class="breadcrumb-item active">Редагування Поста: {{$post->title}}</li>
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
                    <form action="{{route('admin.blog.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group w-25">
                            <div class="form-group w-25">
                                <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                            </div>
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Назва</label>
                            <input type="input" class="form-control" name="title" value="{{ $post->title }}" placeholder="Назва поста">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>

                        <div class="form-group w-25">
                            <label for="exampleInputFile">URI</label>
                            <input type="input" class="form-control" name="uri" value="{{ $post->uri }}"
                                   placeholder="URI">
                            @error('uri')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Дата</label>
                            <input type="input" class="form-control" name="custom_date" value="{{$post->custom_date }}"
                                   placeholder="Дата">
                            @error('custom_date')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Meta Keywords</label>
                            <input type="input" class="form-control" name="meta_keywords"
                                   value="{{ $post->meta_keywords }}" placeholder="Meta Keywords">
                            @error('meta_keywords')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Meta Description</label>
                            <textarea id="summernote_m_d" name="meta_description">
                                 {{ $post->meta_description }}
                            </textarea>
                            @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Контент</label>
                            <textarea id="summernote" name="content">
                                 {{ $post->content }}
                            </textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Змінити Превью</label>
                            <div class="w-50 mb-2">
                                <img src="{{ asset(Storage::url($post->preview_image)) }}" alt="preview_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Вибрати Зображення</label>
                                </div>

                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Змінити Головне Зображення</label>
                            <div class="w-50 mb-2">
                                <img src="{{ asset(Storage::url($post->main_image)) }}" alt="main_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Вибрати Зображення</label>
                                </div>

                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
                            </div>
                        </div>

                        <div class="form-group w-50">
                            <label>Вибрати категорії</label>
                            <select class="select2" name="category_ids[]" multiple="multiple" data-placeholder="Вибрати категорії" style="width: 100%;">

                                @foreach($categories as $category)
                                    <option {{ is_array( $post->categories->pluck('id')->toArray() ) && in_array($category->id, $post->categories->pluck('id')->toArray() ) ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>

                        <div class="form-group w-50">
                            <label>Вибрати основну категорію</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? ' selected' : '' }}
                                    >{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-50">
                            <label>Теги</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Вибрати теги" style="width: 100%;">

                                @foreach($tags as $tag)
                                    <option {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id, $post->tags->pluck('id')->toArray() ) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="published" name="published" value="1" @if($post->published == '1') checked="" @endif>
                                <label class="form-check-label">Опубліковано</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="published" value="0" @if($post->published == '0') checked="" @endif>
                                <label class="form-check-label">Не опубліковано</label>
                            </div>
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
