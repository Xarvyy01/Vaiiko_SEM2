document.getElementById('register_button').addEventListener('click', async function (event) {

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const password2 = document.getElementById('password2').value;
    const name_first = document.getElementById('name_first').value;
    const name_second = document.getElementById('name_second').value;

    let position_symbol1 = 0;


    for (let i = 0; i < email.length; i++) {
        if (email.charAt(i) == '@') {

            position_symbol1 = i;

        }
    }

    let position_symbol2 = 0;

    for (let i = position_symbol1; i < email.length - 1; i++) {

        if (email.charAt(i) == '.') {
            position_symbol2 = i;

        }

    }

    let passwordLength = password.length;
    const specials_symbols = '@|#$%&?!.,'

    let bool = 0;

    for (let i = 0; i < passwordLength; i++) {
        for (let j = 0; j < specials_symbols.length; j++) {

            let a = password.charAt(i);
            let b = specials_symbols.charAt(j);

            if (a == b) {

                bool = 1;

            }

        }
    }

    let errors = [];


    if (position_symbol1 == 0 || position_symbol2 == 0 || position_symbol2 < position_symbol1) {

        errors.push('Zle napisaný email, prosím Vás opravte si ho');

    }
    if (name_first == '' || name_second == '') {

        errors.push('Vyplnte celé meno');

    }

    if (password != password2) {
        errors.push('Hesla sa nezhodujú');
    }

    event.preventDefault();
    let form = document.getElementById('myForm');

    let url = "http://127.0.0.1//?c=auth&a=checkDuplicityUsers";
    let body = {
        "email": email,
    };

// Zrušte predvolené odoslanie formulára


    let response = await fetch(url, {
        method: "POST",
        body: JSON.stringify(body),
        mode: "cors",
        headers: {
            "Content-type": "application/json",
            "Accept": "application/json",
        }
    });

    if (response.ok) {
        const data = await response.json();
        const ret = data["ret"];
        if (ret === false) {
            errors.push('Email už je zaregistrovaný');
        } else {
            alert('Účet úspešne zaregistrovaný')
        }
    }


    if (errors.length > 0) {
        alert(errors[0]);
    } else {
        form.submit();
    }

})