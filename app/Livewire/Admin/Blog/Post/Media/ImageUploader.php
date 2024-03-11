<?php

namespace App\Livewire\Admin\Blog\Post\Media;

use App\Models\Blog\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageUploader extends Component
{
    use WithFileUploads;

    public $post;
    public $path;
    public $fullpath;
    public $folder;
    public $images = [];
    public $imagesName = [];
    public  $name, $size;

    #[Validate(['images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'])]

    public function mount($post, $path, $folder)
    {
        $this->post = $post;
        $this->path = public_path($path);
        $this->folder = $folder;
        $this->fullpath = public_path($path.$folder);
    }

    public function checkFolder() : void
    {
        try {
            if (!File::exists($this->fullpath)) {
                File::makeDirectory($this->fullpath, 0755, true, true);
            }
        } catch (\Exception $exception){
            abort(500);
        }
    }

    public function save()
    {
        $this->checkFolder();
        foreach ($this->images as $image) {
            $image->store($this->fullpath);
            array_push($this->imagesName, $image->hashName());
        }
        $this->dispatch('image-added');
    }

    public function removeImage($index)
    {
        Storage::delete($this->fullpath .'/'. $this->imagesName[$index]);
        unset($this->images[$index]);
        unset($this->imagesName[$index]);
        $this->dispatch('image-added');
    }
    public function render()
    {
        return view('livewire.admin.media.images.image-uploader');
    }
}
