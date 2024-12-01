document.getElementById('send_button').addEventListener('click', function (event) {

    event.preventDefault();

    const email = document.getElementById('email').value;

    let position_symbol1 = 0;


    for (let i = 0; i < email.length; i++) {
        if (email.charAt(i) == '@') {

            position_symbol1 = i;

        }
    }

    let position_symbol2 = 0;

    for (let i = position_symbol1; i < email.length - 1 ; i++) {

        if (email.charAt(i) == '.') {
            position_symbol2 = i;

        }

    }

    let string = '';

    if (position_symbol1 == 0 || position_symbol2 == 0) {

        string1 = 'Zle napisaný email, prosím Vás opravte si ho';

    }

})