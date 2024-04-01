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
                <table id="media-gallery-table" class="table table-hover table-striped">
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
                            <td><input type="text" class="form-control attachment-details-copy-link" id="copy-link_{{$index}}"
                                       value="{{$asset}}" readonly="">
                                <div id="writeln"></div>
                            </td>

                            <td class="text-center">
                                <button type="button" class="border-0 bg-transparent" id="copy-link-button" data-action="{{$index}}">
                                    <i class="fa-solid fa-copy text-primary" id="copy-link-icon"></i>
                                </button>
                            </td>
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


{{--    @endif--}}

    @script

    <script>
        document.addEventListener('livewire:initialized', () => {
            let container = document.getElementById('media-gallery-table');
            const writeln = document.querySelector('.writeln');
            let buttonId;
            container.onclick = function (event) {
                if (event.target.id == 'copy-link-icon') {
                    let parentNode = event.target.parentNode;
                    buttonId = parentNode.dataset.action;
                    //    console.log(buttonId);
                }
                if (event.target.id == 'copy-link-button') {
                    buttonId = event.target.dataset.action;
                    //    console.log(buttonId);
                }
                let copyLink = document.getElementById('copy-link_' + buttonId);

                if (copyLink) {
                    navigator.clipboard.writeText(copyLink.value.trim())
                        .then(() => {
                            copyLink.value = '';
                            if (writeln.innerText !== 'Copied!') {
                                const originalText = writeBtn.innerText;
                                writeln.innerText = 'Copied!';
                                setTimeout(() => {
                                    writeBtn.innerText = originalText;
                                }, 1500);
                            }
                        })
                        .catch(err => {
                            console.log('Something went wrong', err);
                        })
                }

            }
        });
    </script>
    @endscript
</div>

