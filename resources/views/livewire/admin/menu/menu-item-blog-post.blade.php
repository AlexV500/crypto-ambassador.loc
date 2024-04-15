<div>
    <div class="form-group w-100">

        <label>Прив'язка поста блога до меню</label>

        <select wire:model.live="selectedCategory" class="form-control">
            <option value="">Виберіть категорію блога</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    @if(!is_null($selectedCategory))
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table id="media-gallery-table" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th width="4%">ID</th>
                        <th width="74%">Назва</th>
                        <th width="10%">Дата</th>
                        <th width="8%">Cтатус</th>
                        <th width="4%" class="text-center">Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)

                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->custom_date}}</td>
                            <td>@if($post->published == '1') <span class="badge bg-success">Опубліковано</span> @else <span class="badge bg-warning">Не опубліковано</span> @endif</td>

                            @if($image->cover == '1')
                                <td class="text-center">
                                    <button type="button" class="border-0 bg-transparent"
                                            wire:loading.attr="disabled"
                                            wire:target="toggleCoverImage('{{ $image->id }}', '{{ $image->original_content_id }}', '{{ $image->cover }}')"
                                            wire:click.prevent="toggleCoverImage('{{ $image->id }}', '{{ $image->original_content_id }}', '{{ $image->cover }}')">
                                        <i class="fa-solid fa-toggle-on text-success" role="button"></i>
                                    </button>
                                </td>
                            @endif
                            @if($image->cover == '0')
                                <td class="text-center">
                                    <button type="button" class="border-0 bg-transparent"
                                            wire:loading.attr="disabled"
                                            wire:target="toggleCoverImage('{{ $image->id }}', '{{ $image->original_content_id }}', '{{ $image->cover }}')"
                                            wire:click.prevent="toggleCoverImage('{{ $image->id }}', '{{ $image->original_content_id }}', '{{ $image->cover }}')">
                                        <i class="fa-solid fa-toggle-off text-secondary" role="button"></i>
                                    </button>
                                </td>
                            @endif
                            <td class="text-center">
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

    @endif
</div>
