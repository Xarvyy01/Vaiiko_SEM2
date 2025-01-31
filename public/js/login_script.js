document.getElementById('login_button').addEventListener('click', async function (event) {

    event.preventDefault();


    errors = [];
    let form = document.getElementById('myForm');
    if (!form) {
        console.error("Form element not found!");
    }
    let email = document.getElementById('login').value;

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
        if (ret === true) {
            errors.push('Email neni zaregistrovaný na tejto stránke');
        }
    }


    if (errors.length > 0) {
        alert(errors[0]);
    } else {
        form.requestSubmit();
    }

})