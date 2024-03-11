<?php

namespace App\Livewire\Admin\Media\Images;


use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ShowImages extends Component
{
    use WithPagination;
    public $post;

    public function mount($post, $path, $folder)
    {
        $this->post = $post;
        $this->path = public_path($path);
        $this->folder = $folder;
        $this->fullpath = public_path($path.$folder);
    }

    #[On('image-added')]
    public function refreshImages()
    {
        return $this->post->images()->orderBy('created_at', 'DESC')
            ->simplePaginate(4, pageName: 'images-page');
    }


    public function placeholder(): string
    {
        return <<<'HTML'
            <div>
                Loading...
            </div>
        HTML;
    }
    public function render()
    {
        return view('livewire.admin.media.images.show-images', [
            'images' => $this->refreshImages(),
            'fullpath' => $this->fullpath,
        ]);
    }
}
