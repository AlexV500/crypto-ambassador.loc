<div>
    @if ($countImages > 0)
        <h3>Зображення</h3>
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th width="20%">Зображення</th>
                        <th width="65%">URL</th>
                        <th width="10%" colspan="3" class="text-center">Дія</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($images as $index => $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td><img width="100px" src="{{ asset($image->media_folder_path . $image->original_content_id .'/'. $image->image) }}"></td>
                            <td>{{asset($image->media_folder_path . $image->original_content_id .'/'. $image->image)}}</td>
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

</div>
