<?php

/** @var Array $data */

/** @var \App\Core\LinkGenerator $link */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/contactpage_style.css">
    <link rel="stylesheet" href="public/css/box_contact.css">
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
    </script>
    <script type="text/javascript">
        (function(){
            emailjs.init({
                publicKey: "4h60vMsj0Bw1W_oGP",
            });
        })();
    </script>
    <script src="public/js/sendEmail.js"></script>
    <title>Title</title>
</head>
<body>


<section class="hv-100 bg-transparent d-flex justify-content-center align-items-center p-4" id="section">

    <div class="row contact-form position-relative" id="container">

        <div class="frame col-md-6 p-4 p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2605.5992150494726!2d18.65733397671689!3d49.22712747138454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47145e12214bb7dd%3A0x8b1b6c07bc41169d!2s2099%2C%20010%2004%20Ov%C4%8Diarsko!5e0!3m2!1ssk!2ssk!4v1729290426845!5m2!1ssk!2ssk"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0"
                    class="map"
            >
            </iframe>
        </div>

        <div class="col-md-6 p-5 d-flex justify-content-center align-items-center">
            <form class="w-100">
                <div class="header-text mb-4">
                    <h2>Kontaktuj Nás</h2>
                </div>
                <div class="mb-3">
                    <label class="form-label">Téma:</label>
                    <input class="form-control" id="subject" placeholder="Téma">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input class="form-control" id="email" placeholder="priklad@example.com">
                </div>
                <div class="form-floating">
                    <textarea class="form-control mb-3" placeholder="message" id="textarea" style="height: 7em; resize: none;"></textarea>
                    <label for="textarea">Správa...</label>
                </div>
                <div class="d-grid gap-2">
                    <button id="send_button" onclick="sendMail()" class="btn btn-dark">Poslať</button>
                </div>
            </form>
        </div>

    </div>

</section>

<script src="public/js/contact_script.js"> </script>

</body>
</html>