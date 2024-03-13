<div>
    @if (!is_null($images) && !empty($images))
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
                                <button type="button"
                                        wire:loading.attr="disabled" wire:target="handleRemoveImage({{ $index }}, true)"
                                        wire:click.prevent="handleRemoveImage({{ $index }}, true)">
                                    <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <form wire:submit.prevent="save" id="" class="images-form">
        @csrf
        <div class="form-group">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert arert-danger" role="danger"
                {{ session('error') }}
                </div>
            @endif
        </div>
<div class="form-group">
    <input type="file" wire:model="images" multiple>
</div>
<div class="form-group mt-3 mb-3">
    <button id="submit" type="submit" class="">Додати</button>
</div>
</form>

</div>

