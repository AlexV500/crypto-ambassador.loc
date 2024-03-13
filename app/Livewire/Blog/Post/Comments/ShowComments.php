<?php

namespace App\Livewire\Blog\Post\Comments;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ShowComments extends Component
{
    use WithPagination;
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    #[On('comment-added')]
    public function refreshComments()
    {
        return $this->post->comments()->orderBy('created_at', 'DESC')
            ->simplePaginate(4, pageName: 'comments-page');
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
        return view('livewire.blog.post.comments.show-comments', [
            'comments' => $this->refreshComments(),
        ]);
    }
}
