<div>
    <div class="row justify-content-md-center">
        <div class="col-12">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
{{--                     Thank you for reaching out to us!--}}
                    {{ session('message') }}
                </div>
            @endif
            @if (session()->has('error'))
                 <div class="alert alert-danger" role="alert">
            {{ session('error') }}
                 </div>
            @endif
        </div>
    </div>


    <form wire:submit.prevent="submitContactForm" id="contactForm" class="contact-form">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input wire:model="name" type="text" id="name" placeholder="Name">
            </div>
            <div class="col-lg-6 col-md-6">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input wire:model="email" type="email" id="email" placeholder="Email">
            </div>
            <div class="col-lg-6 col-md-6">
                @error('mobileNumber')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input wire:model="mobile_number" type="text" id="mobileNumber" placeholder="Phone">
            </div>
            <div class="col-lg-6 col-md-6">
                @error('subject')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <input wire:model="subject" type="text" id="subject" placeholder="Subject">
            </div>
            <div class="col-lg-12">
                @error('message')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <textarea wire:model="message" id="message" rows="5" placeholder="Message"></textarea>
            </div>

{{--                <div id="captcha" class="mt-4" wire:ignore></div>--}}
{{--                @error('captcha')--}}
{{--                <p class="mt-3 text-sm text-red-600 text-left">--}}
{{--                    {{ $message }}--}}
{{--                </p>--}}
{{--                @enderror--}}

                {{--                <input type="hidden" id="g-recaptcha-response" placeholder="">--}}

{{--                <input type="hidden" id="g-recaptcha-response" placeholder="">--}}


        </div>
        <button id="submit" type="submit" data-sitekey="{{env('RECAPTCHA_SITE_KEY')}}"
                data-callback='handle'
                data-action='submit' class="g-recaptcha theme-btn theme-btn-2">SEND MESSAGE</button>
    </form>
<script src="https://www.google.com/recaptcha/api.js?render={{env('RECAPTCHA_SITE_KEY')}}"></script>
<script>
    function handle(e) {
        grecaptcha.ready(function () {
            grecaptcha.execute('{{env('RECAPTCHA_SITE_KEY')}}', {action: 'submit'})
                .then(function (token) {
                     @this.set('captcha', token);
                });
        })
    }
</script>
</div>
{{--<script src="https://www.google.com/recaptcha/api.js?onload=handle&render=explicit" async defer></script>--}}
{{--<script>--}}
{{--    var  handle = function(e) {--}}
{{--        widget = grecaptcha.render('captcha', {--}}
{{--            'sitekey': '{{ env('CAPTCHA_SITE_KEY') }}',--}}
{{--            'theme': 'light', // you could switch between dark and light mode.--}}
{{--            'callback': verify--}}
{{--        });--}}
{{--    }--}}

{{--    var verify = function (response) {--}}
{{--    @this.set('captcha', response)--}}

{{--    }--}}
{{--</script>--}}
