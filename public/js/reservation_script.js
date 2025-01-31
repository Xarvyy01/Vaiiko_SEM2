document.getElementById('button').addEventListener('click', function (event) {

    const time = document.getElementById('time').value;
    const date = document.getElementById('date').value;

    let parts = time.split(':');
    errors = [];

    let string1 = '';
    let string2 = '';


    if (parts.length != 2 || parseInt(parts[0]) <= 0 || parseInt(parts[0]) > 23 || parseInt(parts[1]) < 0 || parseInt(parts[1]) > 59) {
        errors.push('Zle zadaný čas (príklad: 15:30)');
    }

    parts = date.split('.');

    if (date.length < 8 || date.length > 12 || parseInt(parts[0]) < 0 || parseInt(parts[0]) > 31 || parseInt(parts[1]) < 1 || parseInt(parts[1]) > 12 || parseInt(parts[2]) != 2025) {
        errors.push('Zle zadaný dátum (príklad: 20250110 => 01.10.2025)');
    }

    if (errors.length > 0) {
        alert(errors[0]);
        event.preventDefault();
    }

})