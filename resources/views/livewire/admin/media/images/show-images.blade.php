<div>

    @if (!is_null($images) && !empty($images))
        <h4>Current Images</h4>
        <div class="image-wrapper mb-4">
            @foreach ($images as $index => $image)
                <div
                    class="single-image">
                    <img src="{{ asset($fullpath . $image) }}"
                         width="" alt="">
                    <button type="button"
                            wire:loading.attr="disabled" wire:target="handleRemoveImage({{ $index }}, true)"
                            wire:click.prevent="handleRemoveImage({{ $index }}, true)">
                        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endforeach
        </div>
    @endif

</div>
