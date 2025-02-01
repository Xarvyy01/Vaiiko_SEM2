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
    <link rel="stylesheet" href="public/css/contactpage_style.css">
    <link rel="stylesheet" href="public/css/profilepage_style.css">
    <title>Boostrap Login | Ludiflex</title>
</head>
<body>

<div class="margin"></div>

<main>

    <section class="hv-100 bg-transparent d-flex justify-content-center align-items-center p-4" id="section">

        <div class="row contact-form position-relative" id="container">

            <div class="frame col-md-6 p-4 p-0">
                <img class="pic" src="<?= $data['picture']?>" alt="architecture">
            </div>

            <div class="col-md-6 p-5 d-flex justify-content-center align-items-center">
                <form class="w-100">
                    <div class="header-text mb-4">
                        <h2>Profilové informácie:</h2>
                    </div>
                    <div class="form-floating mb-3">
                        <p><strong>Email:</strong> <span><?= $data["email"] ?></span></p>
                    </div>
                    <div class="mb-3">
                        <p><strong>Voláte sa:</strong> <span><?= $data["name"] ?></span></p>
                    </div>
                    <div class="form-floating mb-3">
                        <p><strong>Identifikačné číslo:</strong> <span><?= $data["id"] ?></span></p>
                    </div>
                    <div class="d-grid mb-0">
                        <a class="btn btn-lg btn-dark w-100 fs-6" href="<?= $link->url("auth.registration") ?>">
                            <small>Zmeniť fotku</small>
                        </a>
                    </div>
                </form>
            </div>

        </div>

    </section>

</main>

<script src="public/js/login_script.js"> </script>

</body>
</html>
