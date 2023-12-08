<form id="contactForm" class="contact-form">

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
            <input type="text" id="mobile_number" name="mobile_number" placeholder="Phone">
            @error('mobile_number')
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
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" placeholder="">
            @error('g-recaptcha-response')
            <div class="text-danger">{{ $message }}</div>
            @enderror()
        </div>
    </div>
    <button id="submit" class="g-recaptcha theme-btn theme-btn-2">SEND MESSAGE</button>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
    $('#contactForm').on('submit',function(e){

        e.preventDefault();
        let name = $('#name').val();
        let email = $('#email').val();
        let mobile_number = $('#mobile_number').val();
        let subject = $('#subject').val();
        let message = $('#message').val();

        grecaptcha.ready(function () {
            grecaptcha.execute('{{config('services.recaptcha.site_key')}}', {action: 'contacts'}).then(function (token) {
                document.getElementById("g-recaptcha-response").value = token;
                $.ajax({
                    url: "{{route('contacts.store')}}",
                    type:"POST",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        name:name,
                        email:email,
                        mobile_number:mobile_number,
                        subject:subject,
                        message:message,
                    },
                    success:function(response){
                        console.log(response);
                    },
                });
                document.getElementById("contact-form").submit();
            });
        });


    });

// function onSubmit(token) {
//         document.getElementById("contact-form").submit();
//     }
</script>
