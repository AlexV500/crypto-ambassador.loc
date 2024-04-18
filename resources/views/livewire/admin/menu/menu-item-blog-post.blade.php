<div>
    <div class="form-group w-100">

        <label>Прив'язка поста блога до меню</label>

        <select wire:model.live="selectedCategoryId" class="form-control">
            <option value="">Виберіть категорію блога</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>

    @if(!is_null($selectedCategoryId))
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

                            @if($menuItem->url == $post->uri)
                                <td class="text-center">
                                    <button type="button" class="border-0 bg-transparent"
                                            wire:loading.attr="disabled"
                                            wire:target="unBindMenuItem()"
                                            wire:click.prevent="unBindMenuItem()">
                                        <i class="fa-solid fa-toggle-on text-success" role="button"></i>
                                    </button>
                                </td>
                            @endif
                            @if($menuItem->url !== $post->uri)
                                <td class="text-center">
                                    <button type="button" class="border-0 bg-transparent"
                                            wire:loading.attr="disabled"
                                            wire:target="bindMenuItem('{{ $post->uri }}')"
                                            wire:click.prevent="bindMenuItem('{{ $post->uri }}')">
                                        <i class="fa-solid fa-toggle-off text-secondary" role="button"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        {{ $posts->links(data: ['scrollTo' => false]) }}

    @endif
</div>
