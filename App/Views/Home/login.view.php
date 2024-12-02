<?php

/** @var Array $data */
/** @var \App\Models\Review $review */

/** @var \App\Core\LinkGenerator $link */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css//loginpage_style.css">
    <link rel="stylesheet" href="public/css/button_style.css">
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
                        <h2>Prihláseniť Sa</h2>
                        <p>Prihlás sa, a objednaj sa na strihanie</p>
                    </div>
                    <div class="input-group mb-4">
                        <input id="email" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Emailová Adresa">
                    </div>
                    <div class="input-group">
                        <input id="password" type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Heslo">
                    </div>
                    <div class="input-group mb-5 d-flex justify-content-between">
                    </div>
                    <div class="input-group mb-3">
                        <button id="login_button" class="btn btn-lg btn-dark w-100 fs-6">Prihlásenie</button>
                    </div>
                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-light w-100 fs-6"><small>Registrácia</small></button>
                    </div>
                    <a href="<?= $link->url('review.index')?>" class="btn btn-success">Pridať</a>
                </div>
            </div>

        </div>
    </div>
</main>

<script src="public/js/login_script.js"> </script>

</body>
</html>