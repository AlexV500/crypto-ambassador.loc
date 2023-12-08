@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Додавання Поста ({{$getLocaleName}})</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.post.index') }}">Пости</a></li>
                        <li class="breadcrumb-item active">Створення Поста</li>
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
                    <form action="{{route('admin.blog.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25">
                            <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Назва</label>
                            <input type="input" class="form-control" id="form-title" name="title" value="{{ old('title') }}"
                                   placeholder="Назва поста">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">URI</label>
                            <input type="input" class="form-control" name="uri" value="{{ old('uri') }}"
                                   placeholder="URI">
{{--                            <button onclick="convert()" style="margin-top: 0.5rem;">Covert Now</button>--}}
                            @error('uri')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-25">
                            <label for="exampleInputFile">Дата</label>
                            <input type="input" class="form-control" name="custom_date" value="{{$customDate }}"
                                   placeholder="Дата">
                            @error('custom_date')
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
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Додати Превью</label>
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
                            <label for="exampleInputFile">Додати Головне Зображення</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Вибрати Зображення</label>
                                </div>

                            </div>
                            @error('main_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>

{{--                        <div class="form-group w-50">--}}
{{--                            <label>Вибрати категорію</label>--}}
{{--                            @foreach($categories as $category)--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" name="category_id" value="{{ $category->id }}" type="checkbox" {{ $category->id == old('category_id') ? ' checked=""' : '' }}>--}}
{{--                                <label class="form-check-label">{{ $category->title }}</label>--}}
{{--                            </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
                        <div class="form-group w-50">
                            <label>Вибрати категорії</label>
                            <select class="select2" name="category_ids[]" multiple="multiple" data-placeholder="Вибрати категорії"
                                    style="width: 100%;">
                                @foreach($categories as $category)
                                    <option
                                        {{ is_array( old('category_ids')) && in_array($category->id, old('category_ids')) ? ' selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_ids')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>

                        <div class="form-group w-50">
                            <label>Вибрати основну категорію</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == old('category_id') ? ' selected' : '' }}
                                    >{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-50">
                            <label>Теги</label>
                            <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Вибрати теги"
                                    style="width: 100%;">

                                @foreach($tags as $tag)
                                    <option
                                        {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            @error('tag_ids')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
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
                </div>
            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
