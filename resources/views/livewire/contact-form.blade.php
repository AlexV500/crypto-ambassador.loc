<div>
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
            <div>
                @error('g-recaptcha-response')
                <div class="text-danger">{{ $message }}</div>
                @enderror
{{--                <input type="hidden" id="g-recaptcha-response" placeholder="">--}}
            </div>
        </div>
        <button id="submit" type="submit" class="g-recaptcha theme-btn theme-btn-2">SEND MESSAGE</button>
    </form>
</div>
