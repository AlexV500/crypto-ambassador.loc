<div>
{{--    @if ($countImages > 0)--}}
        <h3>Зображення</h3>
    @if (session()->has('error'))
        <div class="alert arert-danger" role="danger">
            {{ session('error') }}
        </div>
    @endif
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover table-striped text-nowrap">
                    <thead>
                    <tr>
                        <th width="4%">ID</th>
                        <th width="12%">Зображення</th>
                        <th width="73%">URL</th>
                        <th width="10%" colspan="3" class="text-center">Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($images as $index => $image)
                        @php
                         $path = $image->media_folder_path . $image->original_content_id .'/'. $image->image;
                         $asset = asset($image->media_folder_path . $image->original_content_id .'/'. $image->image);
                         @endphp
                        <tr>
                            <td>{{$image->id}}</td>
                            <td><img width="100px" src="{{ $asset }}"></td>
                            <td><input type="text" class="form-control attachment-details-copy-link" id="attachment-details-two-column-copy-link"
                                       value="{{$asset}}" readonly="">
                            </td>
                            <td>
                                <button type="button" class="border-0 bg-transparent"
                                        wire:loading.attr="disabled"
                                        wire:target="removeImage('{{ $image->id }}', '{{ $path }}')"
                                        wire:click.prevent="removeImage('{{ $image->id }}', '{{ $path }}')">
                                    <i class="fas fa-trash text-danger" role="button"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    {{ $images->links(data: ['scrollTo' => false]) }}


{{--    @endif--}}

</div>
