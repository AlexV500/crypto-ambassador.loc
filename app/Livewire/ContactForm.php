<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $mobile_number = '';
    public $subject = '';
    public $message = '';

    public function submitContactForm(){

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'required|string|max:255',
            'mobile_number' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required',
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

        Contact::firstOrCreate($validated);
    //    return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
