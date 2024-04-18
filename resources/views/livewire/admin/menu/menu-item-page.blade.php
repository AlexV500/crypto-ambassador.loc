<div>
    <div class="form-group w-100">

        <label>Прив'язка поста блога до меню</label>

    </div>

        <div class="card">
            <div class="card-body table-responsive p-0">
                <table id="media-gallery-table" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th width="4%">ID</th>
                        <th width="84%">Назва</th>
                        <th width="8%">Cтатус</th>
                        <th width="4%" class="text-center">Дія</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->title}}</td>

                            <td>@if($page->published == '1') <span class="badge bg-success">Опубліковано</span> @else <span class="badge bg-warning">Не опубліковано</span> @endif</td>

                            @if($menuItem->url == $page->uri)
                                <td class="text-center">
                                    <button type="button" class="border-0 bg-transparent"
                                            wire:loading.attr="disabled"
                                            wire:target="unBindMenuItem()"
                                            wire:click.prevent="unBindMenuItem()">
                                        <i class="fa-solid fa-toggle-on text-success" role="button"></i>
                                    </button>
                                </td>
                            @endif
                            @if($menuItem->url !== $page->uri)
                                <td class="text-center">
                                    <button type="button" class="border-0 bg-transparent"
                                            wire:loading.attr="disabled"
                                            wire:target="bindMenuItem('{{ $page->uri }}')"
                                            wire:click.prevent="bindMenuItem('{{ $page->uri }}')">
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
        {{ $pages->links(data: ['scrollTo' => false]) }}
</div>
