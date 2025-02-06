function sendMail() {
    (function(){
        emailjs.init({
            publicKey: "4h60vMsj0Bw1W_oGP",
        });
    })();

    let parms = {
        email: document.getElementById("email").value,
        subject: document.getElementById("subject").value,
        message: document.getElementById("textarea").value,
    };

    emailjs.send("service_qiu4dyv", "template_6bto2jl", parms)
        .then(function(response) {
            alert("Email bol poslaný!");
            window.location.reload();
        }, function(error) {
            alert("Nastala chyba pri odosielaní e-mailu: " + error.text);
        });
}
