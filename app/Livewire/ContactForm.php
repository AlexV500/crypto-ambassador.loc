<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $mobile_number = '';
    public $subject = '';
    public $message = '';

    public $success;
    public $error;
    public $captcha = 0;

    public function updatedCaptcha($token)
    {
        $response = Http::post('https://www.google.com/recaptcha/api/siteverify?secret=' . env('RECAPTCHA_SECRET_KEY') . '&response=' . $token);
        $this->captcha = $response->json()['score'];

        if (!$this->captcha > .3) {
            $this->submitContactForm();
        } else {
           request()->session()->flash('error', 'Google thinks you are a bot, please refresh and try again');
        }
    }
    public function submitContactForm(){

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'mobile_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required',

        ]);

    //    dd($validated);


        try{
            Contact::create($validated);
        }catch (\Exception $e){
            request()->session()->flash('error', 'Oops Something went wrong!');
        }
        request()->session()->flash('message' ,'Thank you for reaching out to us!');
    //    $this->reset();

    //    return redirect()->to('/');

    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
