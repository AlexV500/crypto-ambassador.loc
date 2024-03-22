<div>
    @if ($countImages > 0)
        <h3>Зображення</h3>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="30%">Зображення</th>
                        <th width="55%">URL</th>
                        <th width="10%" colspan="3" class="text-center">Дія</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($images as $index => $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td><img src="{{ asset($fullpath . $image) }}"></td>
                            <td>{{asset($fullpath . $image)}}</td>
                            <td>
                                <form action="{{route('admin.media.images.delete', $image->id)}}" method="POST">
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
            {{ $images->links() }}
        </div>
    @endif


    <form action="{{route('admin.media.images.upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="image_path" value="{{ $imagePath }}">
        <input type="hidden" name="post_type" value="{{ $postType }}">
        <input type="hidden" name="lang" value="{{ $currentLocale }}">
        <div class="form-group">
            <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
        </div>
        <div class="form-group mt-3 mb-3">
            <button id="submit" type="submit" class="">Додати</button>
        </div>
    </form>

</div>
