<form action="{{route('contacts.store')}}" method="POST" id="contact-form" class="contact-form">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <input type="text" id="name" name="name" placeholder="Name">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror()
        </div>
        <div class="col-lg-6 col-md-6">
            <input type="email" id="email" name="email" placeholder="Email">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror()
        </div>
        <div class="col-lg-6 col-md-6">
            <input type="text" id="phone" name="phone" placeholder="Phone">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror()
        </div>
        <div class="col-lg-6 col-md-6">
            <input type="text" id="subject" name="subject" placeholder="Subject">
            @error('subject')
            <div class="text-danger">{{ $message }}</div>
            @enderror()
        </div>
        <div class="col-lg-12">
            <textarea name="message" id="message" rows="5" placeholder="Message"></textarea>
            @error('message')
            <div class="text-danger">{{ $message }}</div>
            @enderror()
        </div>
        <div>
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" placeholder="Phone">
            @error('g-recaptcha-response')
            <div class="text-danger">{{ $message }}</div>
            @enderror()
        </div>
    </div>
    <button type="submit" class="g-recaptcha theme-btn theme-btn-2" onclick="onClick(event)">SEND MESSAGE</button>
</form>
<script>
    function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('{{config('services.recaptcha.site_key')}}', {action: 'contacts'}).then(function (token) {
                document.getElementById("g-recaptcha-response").value = token;
                document.getElementById("contact-form").submit();
            });
        });
    }


// function onSubmit(token) {
//         document.getElementById("contact-form").submit();
//     }
</script>
