<?php

namespace App\Livewire\Blog\Post\Comments;

use Livewire\Component;
use Livewire\Attributes\On;

class CountComments extends Component
{
    public $post;
    public int $commentsCount = 0;

    public function mount($post)
    {
        $this->post = $post;
        $this->commentsCount = $this->post->comments->count();
    }

    #[On('comment-added')]
    public function commentAdded(): void
    {
        $this->commentsCount++;
    }

 //   #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.blog.post.comments.count-comments', [
            'count' => $this->commentsCount,
        ]);
    }
}
