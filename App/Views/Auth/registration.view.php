<?php

/** @var Array $data */
/** @var \App\Models\Review $review */

/** @var \App\Core\LinkGenerator $link */
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/loginpage_style.css">
    <link rel="stylesheet" href="public/css/button_style.css">
    <link rel="stylesheet" href="public/css/box_register.css">
    <link rel="stylesheet" href="public/css/error.css">
    <title>Boostrap Login | Ludiflex</title>
</head>
<body>

<div class="margin"></div>

<main>
    <div class="container d-flex justify-content-center align-items-center">

        <div class="row border rounded-5 p-3 shadow box-area">

            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Registrovať Sa</h2>
                        <p>Registruj sa, a získaj výhody</p>
                    </div>
                    <form class="form-signin" id="myForm" method="post" action="<?= $link->url("register") ?>">

                        <div class="form-label-group mb-4">
                            <input id="email" type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Emailová Adresa">
                        </div>
                        <div class="form-label-group mb-4">
                            <input id="name_first" name="name_first" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Meno">
                        </div>
                        <div class="form-label-group mb-4">
                            <input id="name_second" name="name_second" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Priezvisko">
                        </div>
                        <div class="form-label-group mb-4">
                            <input id="password" name="password" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Heslo">
                        </div>
                        <div class="form-label-group mb-4">
                            <input id="password2" name="password_repeat" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Potvrdte Heslo">
                        </div>
                        <div class="form-label-group mb-5 d-flex justify-content-between">
                        </div>
                        <div class="input-group mb-3">
                            <button id="register_button" class="btn btn-lg btn-light w-100 fs-6 btn-dark"><small>Registrovať</small></button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="text-center p-3 ">
        <?php
        if ($data['error'] != null) {
                echo '<span class="error">' .$data['error']. '</span>';
        }
        ?>
    </div>
</main>

<script src="public/js/register_script.js"> </script>

</body>
</html>