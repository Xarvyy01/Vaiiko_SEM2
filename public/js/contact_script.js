document.getElementById('send_button').addEventListener('click', function (event) {

    event.preventDefault();

    const email = document.getElementById('email').value;
    const text = document.getElementById('textarea').value;
    const title =  document.getElementById('subject').value;

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

    let string1 = '';
    let value = 0;

    if (position_symbol1 == 0 || position_symbol2 == 0) {

        string1 = 'Zle napisaný email, prosím Vás opravte si ho';
        value = 1;

    }

    let text_length = text.length;

    let string2 = '';

    if(text_length < 10) {

        string2 = 'Správa musí obsahovať minimálne 10 znakov';
        value = 1;

    }

    if (value == 1) {
        alert(string1 + '\n' + string2);
    }


})