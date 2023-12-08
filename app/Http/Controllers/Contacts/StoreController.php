<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Closure;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request) {

        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255'],
//            'subject' => ['required', 'string', 'max:255'],
//            'mobile_number' => ['required', 'string', 'max:255'],
            'g-recaptcha-response' => ['required',
                function (string $attribute, mixed $value, Closure $fail) {
                    $gResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                        'secret' => config('services.recaptcha.secret_key'),
                        'response' => $value,
                        'remoteip' => \request()->ip()

                    ]);
               //     dd($gResponse->json());
                    if ($gResponse->json('success')) {
                        $fail("The {$attribute} is invalid.");
                    }
                },
            ],
        ]);

        $data = $request->validated();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['mobile_number'] = $request->mobile_number;
        $data['message'] = $request->message;
        Contact::create($data);

    //    return redirect()->route('main.index');
        return response()->json(['success'=>'Form is successfully submitted!']);

    }
}
