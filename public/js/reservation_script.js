document.getElementById('button').addEventListener('click', function (event) {

    const time = document.getElementById('time').value;
    const date = document.getElementById('date').value;

    const parts = time.split('.');

    let string1 = '';
    let string2 = '';

    if (parts.length !== 2) {
        string1 = 'Zle zadaný čas (príklad: 15.5 => 15:30 | 12.0 => 12:00)';
    }

    if (date.length != 8) {
        string2 = 'Zle zadaný dátum (príklad: 20250110 => 01.10.2025)'
    }

    if (string2 != '' || string1 != '') {
        let string = string1 + '\n' + string2;
        alert(string);
        event.preventDefault();
    }

})