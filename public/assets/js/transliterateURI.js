function transliterateURI(value) {
    let uriFormInput = document.getElementById('uri-form-input');
    fetch('/transliterate-uri', {
        method: 'POST',
        //    credentials: "same-origin",
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'url': '/transliterate-uri',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: JSON.stringify({
            title: value,
        }),
    }).then((response) => response.json())
        .then((data) => {
            uriFormInput.value = data.title;
        })
}
