@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагування Тега</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.tag.index') }}">Теги</a></li>
                        <li class="breadcrumb-item active">Редагування тега: {{$tag->title}}</li>
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
                    <form action="{{route('admin.blog.tag.update', $tag->id)}}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <div class="form-group w-25">
                                <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                            </div>
                        </div>
                         <div class="form-group">
                             <label>Назва тега</label>
                             <div class="form-group">
                                 <input type="input" class="form-control" name="title" placeholder="Назва категорії" value="{{$tag->title}}">
                                 @error('title')
                                     <div class="text-danger">{{ $message }}</div>
                                 @enderror()
                             </div>
                        </div>
                        <label>URI</label>
                        <div class="form-group">
                            <input type="input" class="form-control" name="uri" value="{{ $tag->uri }}"
                                   placeholder="URI">
                            @error('uri')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group">
                            <label>Колір</label>
                            <div class="form-group">
                                <input type="color" class="m-auto form-control form-control-color" id="GFG_Color" name="color" placeholder="Колір" value="{{$tag->color}}">
{{--                                <input type="input" id="cp1" class="form-control" name="color" placeholder="Колір" value="{{$tag->color}}">--}}
                                @error('color')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror()
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
