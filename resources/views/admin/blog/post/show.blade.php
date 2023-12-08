@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-3">{{ $post->title }} ({{$getLocaleName}})</h1>
                    <a href="{{route('admin.blog.post.edit', $post->id)}}" class="text-success mr-3"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{route('admin.blog.post.delete', $post->id)}}" method="POST" class="mb-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-transparent">
                            <i class="fas fa-trash text-danger" role="button"></i>
                        </button>
                    </form>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.post.index') }}">Пости</a></li>
                        <li class="breadcrumb-item active">{{$post->title}}</li>
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
                    <div class="card">

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover">

                                <tbody>
                                    <tr>
                                        <td>ID:</td>
                                        <td>{{$post->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Назва:</td>
                                        <td>{{$post->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>URI:</td>
                                        <td>{{$post->uri}}</td>
                                    </tr>
                                    <tr>
                                        <td>Дата:</td>
                                        <td>{{$post->custom_date}}</td>
                                    </tr>
                                    <tr>
                                        <td>Статус:</td>
                                        <td>@if($post->published == '1') Опубліковано @else Не опубліковано @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Meta Keywords:</td>
                                        <td>{{$post->meta_keywords}}</td>
                                    </tr>
                                    <tr>
                                        <td>Meta Description:</td>
                                        <td>{!!$post->meta_description!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Контент:</td>
                                        <td>{!!$post->content!!}</td>
                                    </tr>
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
<!-- /.content-wrapper -->
@endsection
