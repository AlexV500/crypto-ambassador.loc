<form id="contactForm" class="contact-form">
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

<script>
    $('#contactForm').on('submit', async function(event){

        let token = document.querySelector(‘meta[name=”csrftoken”]’).getAttribute(‘content’);//Select input values with the data you want to send
        let name = document.querySelector(‘input[name=”name”]’).value;
        let number = document.querySelector(‘input[name=”number”]’).value;//Define your post url
        let url = '/admin/part/store';//Define redirect if needed
        let redirect = '/admin/part/list';//Select your form to clear data after sucessful post
        let form = document.querySelector('#addPart');

        event.preventDefault();
        fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
            },
            method: 'post',
            credentials: "same-origin",
            body: JSON.stringify({
                name: name,
                number: number
            })
        })
            .then((data) => {
                form.reset();
                window.location.href = redirect;
            })
            .catch(function(error) {
                console.log(error);
            });
    }

        {{--grecaptcha.ready(function () {--}}
        {{--    grecaptcha.execute('{{config('services.recaptcha.site_key')}}', {action: 'contacts'}).then(function (token) {--}}
        {{--        document.getElementById("g-recaptcha-response").value = token;--}}

        {{--        document.getElementById("contact-form").submit();--}}
        {{--    });--}}
        {{--});--}}


    });

// function onSubmit(token) {
//         document.getElementById("contact-form").submit();
//     }
</script>
