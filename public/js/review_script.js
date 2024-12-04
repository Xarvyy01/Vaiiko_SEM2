document.getElementById('login_button').addEventListener('click', function (event) {

    event.preventDefault();

    let name = document.getElementById('name').value;
    let rating = document.getElementById('rating').value;
    let sentiment =  document.getElementById('sentiment').value;
    let text =  document.getElementById('text').value;

    let error1 = " ";
    let error2 = " ";
    let error3 = " ";
    let error4 = " ";


    if (!Number.isInteger(name)) {
        error1 = "Meno musí byť číslo";
    }

    if (!Number.isInteger(rating)) {
        error2 = "Hodnotenie musí byť číslo";
    }

    if ((rating < 0 && rating > 10) || rating === "") {
        error3 = "Hodnotenie musí byť od 0 až po 10";
    }

    if (!Number.isInteger(sentiment) || (sentiment < 0 && sentiment > 1)) {
        error4 = "Hodnotenie musí byť číslo 0 alebo 1";
    }

    alert(error1 + "\n" + error2 + "\n" + error3 + "\n" + error4)
})