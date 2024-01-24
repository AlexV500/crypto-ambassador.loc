<?php

namespace App\Livewire\Blog\Post\Comments;

use App\Models\Blog\Comment;
use Livewire\Component;

class StoreComment extends Component
{

    public $message = '';
    public $post;
    public $success;
    public $error;

    public function submitComment(){

        $data = $this->validate([
            'message' => 'required|string',

            //            'g-recaptcha-response' => ['required',
//                function (string $attribute, mixed $value, Closure $fail) {
//                    $gResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
//                        'secret' => config('services.recaptcha.secret_key'),
//                        'response' => $value,
//                        'remoteip' => \request()->ip()
//
//                    ]);
//                    //     dd($gResponse->json());
//                    if ($gResponse->json('success')) {
//                        $fail("The {$attribute} is invalid.");
//                    }
//                },
//            ],
        ]);

    //    dd($validated);


        try{
            $data['user_id'] = auth()->user()->id;
            $data['post_id'] = $this->post->id;
        //    dd($data);
            Comment::create($data);

        }catch (\Exception $e){
            request()->session()->flash('error', 'Oops Something went wrong!');
        }
        $this->dispatch('comment-added');
        request()->session()->flash('message' ,'Thank you for reaching out to us!');
    //    $this->reset();
        //    return redirect()->to('/');


    //    return redirect()->to('/');

    }

    public function render()
    {
        return view('livewire.blog.post.comments.store-comment');
    }
}
