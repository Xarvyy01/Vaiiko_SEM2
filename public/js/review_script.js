document.getElementById('login_button').addEventListener('click', function (event) {

    let rating = document.getElementById('rating').value;
    let text =  document.getElementById('text').value;

    let isNum = 0

    let errors = [];


    let numbers = "0123456789"


    if (!isNumber(rating) || rating == "") {
        errors.push("Hodnotenie musí byť číslo");
    }

    let num = Number(rating);

    if (!(num >= 0 && num <= 10) || rating === "") {
        errors.push("Hodnotenie musí byť od 0 až po 10");
    }


    function isNumber(number) {

        for (let i = 0; i < number.length; i++) {
            isNum = 0
            for (let j = 0; j < numbers.length; j++) {
                if (number.charAt(i) == numbers.charAt(j)) {
                    isNum = 1
                }
            }

            if (isNum == 0) {
                return false;
            }

        }
        return true
    }

    if (errors.length > 0) {
        alert(errors[0]);
        event.preventDefault();
    }

})