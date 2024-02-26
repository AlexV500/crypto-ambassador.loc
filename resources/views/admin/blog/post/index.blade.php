@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пости ({{$getLocaleName}})</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item active">Пости</li>
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
                <div class="col-1 mb-3">
                     <a href="{{route('admin.blog.post.create')}}" class="btn btn-block btn-primary">Додати</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th width="3%">ID</th>
                                    <th width="44%">Назва</th>
                                    <th width="10%">Дата</th>
                                    <th width="8%">Cтатус</th>
                                    <th width="14%">+ Переклад</th>
                                    <th width="10%" colspan="3" class="text-center">Дія</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{$post->custom_date}}</td>
                                        <td>@if($post->published == '1') <span class="badge bg-success">Опубліковано</span> @else <span class="badge bg-warning">Не опубліковано</span> @endif</td>
                                        <td><x-language-selector :siteEntity="$siteEntity" :originalContentId="$post->original_content_id"
                                                                 :contentTitle="$post->title"
                                                                 :route="'admin.blog.post.create'"
                                                                 :publicRoute="'blog.post.show'"
                                            ></x-language-selector></td>
                                        <td class="text-center"><a href="{{route('admin.blog.post.show', $post->id)}}"><i class="far fa-eye"></i></a></td>
                                        <td class="text-center"><a href="{{route('admin.blog.post.edit', $post->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center">
                                            <form action="{{route('admin.blog.post.delete', $post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                    <div class="mt-5">
                        {{ $posts->links() }}
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
