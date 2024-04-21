@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex align-items-center">
                    <h1 class="m-0 mr-3">{{ $page->title }} ({{$getLocaleName}})</h1>
                    <a href="{{route('admin.page.edit', $page->id)}}" class="text-success mr-3"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{route('admin.page.delete', $page->id)}}" method="POST" class="mb-0">
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
                        <li class="breadcrumb-item"><a href="{{ route('admin.page.index') }}"></a></li>
                        <li class="breadcrumb-item active">{{$page->title}}</li>
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
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$page->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Назва</td>
                                        <td>{{$page->title}}</td>
                                    </tr>
                                    <tr>
                                        <td>URI:</td>
                                        <td>{{$page->uri}}</td>
                                    </tr>
                                    <tr>
                                        <td>Статус:</td>
                                        <td>@if($page->published == '1') Опубліковано @else Не опубліковано @endif</td>
                                    </tr>
                                    <tr>
                                        <td>Meta Keywords:</td>
                                        <td>{{$page->meta_keywords}}</td>
                                    </tr>
                                    <tr>
                                        <td>Meta Description:</td>
                                        <td>{!!$page->meta_description!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Контент</td>
                                        <td>{!!$page->content!!}</td>
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