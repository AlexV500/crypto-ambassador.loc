@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-2">Редагування Сніпета ({{$getLocaleName}})</h1>
                    <h5 class="m-0">Системне Ім`я: ({{$snippet->system_name}})</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.snippets.index') }}">Сніпети</a></li>
                        <li class="breadcrumb-item active">Редагування Сніпета: {{$snippet->title}}</li>
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
                    <form action="{{route('admin.snippets.update', $snippet->id)}}" method="POST" class="">
                        @csrf
                        @method('PATCH')
                        <div class="form-group w-25">
                            <input type="hidden" name="lang" value="{{ $getCurrentLocale }}">
                        </div>

                        <div class="form-group w-25">
                            <label for="exampleInputFile">Назва Сніпета</label>
                            <input type="input" class="form-control" name="title" placeholder="Назва Сніпета"
                                   value="{{$snippet->title}}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror()
                        </div>
                        <div class="form-group w-75">
                            <label for="exampleInputFile">Контент (HTML Код)</label>
                            <textarea class="form-control" id="" rows="14" name="content">
                                     {{ $snippet->content }}
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
