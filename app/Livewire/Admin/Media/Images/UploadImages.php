<?php

namespace App\Livewire\Admin\Media\Images;

use App\Models\Blog\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Livewire\Attributes\On;
class UploadImages extends Component
{
    use WithFileUploads;

    public $message = '';
    public $images = [];

    public function submit()
    {
        foreach ($this->images as $image) {
            $image->store(path: 'image');
        }
    }
}
