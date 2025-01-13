document.getElementById('register_button').addEventListener('click', function (event) {

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

    for (let i = position_symbol1; i < email.length - 1 ; i++) {

        if (email.charAt(i) == '.') {
            position_symbol2 = i;

        }

    }

    let passwordLength =  password.length;
    const specials_symbols = '@|#$%&?!.,'

    let bool = 0;

    for (let i = 0; i < passwordLength; i++) {
        for (let j = 0 ; j < specials_symbols.length; j++) {

            let a = password.charAt(i);
            let b = specials_symbols.charAt(j);

            if (a == b) {

                bool = 1;

            }

        }
    }

    let string1 = '';
    let string2 = '';
    let string3 = '';
    let string4 = '';


    if (passwordLength < 8 && bool != 1)  {
        string2 = 'Heslo neobsahuje 8 znakov, alebo žiadny špecialný znak';
    }

    if (position_symbol1 == 0 || position_symbol2 == 0 || position_symbol2 < position_symbol1) {

        string1 = 'Zle napisaný email, prosím Vás opravte si ho';

    }
    if (name_first == '' || name_second == '') {

        string4 = 'Vyplnte celé meno';

    }

    if(password != password2) {
        string3 = 'Hesla sa nezhodujú';
    }

    if (string2 != '' || string1 != '' || string3 != '' || string4 != '') {
        let string = string1 + '\n' + string2 + '\n' + string4 + '\n' + string3;
        alert(string);
        event.preventDefault();
    }

})