document.getElementById('login_button').addEventListener('click', function (event) {



    let name = document.getElementById('name').value;
    let rating = document.getElementById('rating').value;
    let sentiment =  document.getElementById('sentiment').value;
    let text =  document.getElementById('text').value;

    let isNum = 0

    let error1 = " ";
    let error2 = " ";
    let error3 = " ";
    let error4 = " ";

    let numbers = "0123456789"

    if (!isNumber(name) || name == "") {
        error1 = "Meno musí byť číslo";
    }

    if (!isNumber(rating) || rating == "") {
        error2 = "Hodnotenie musí byť číslo";
    }

    if ((rating < 0 && rating > 10) || rating === "") {
        error3 = "Hodnotenie musí byť od 0 až po 10";
    }

    if (!isNumber(sentiment) || (sentiment < 0 && sentiment > 1) || sentiment == "") {
        error4 = "Hodnotenie musí byť číslo 0 alebo 1";
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

    if (error1 != " " || error2 != " " || error3 != " " || error4 != " ") {
        alert(error1 + "\n" + error2 + "\n" + error3 + "\n" + error4)
        event.preventDefault();
    }

})