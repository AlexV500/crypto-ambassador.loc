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
                <div class="alert arert-danger" role="danger"
                {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <form wire:submit.prevent="submitComment" id="contactForm" class="contact-form">

        @csrf
        <div class="form-group">
            @error('message')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <textarea class="form-control" wire:model="message" id="message" rows="3"
                      placeholder="Join the discussion and leave a comment!"></textarea>
        </div>
        {{--                <input type="hidden" id="g-recaptcha-response" placeholder="">--}}
        <div class="form-group mt-3 mb-3">
            <button id="submit" type="submit" class="g-recaptcha btn post-comment-btn">Post comment</button>
        </div>

    </form>
</div>
