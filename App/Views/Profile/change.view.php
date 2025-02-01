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
    <link rel="stylesheet" href="public/css/changepage_style.css">
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
                        <h2>Profilová fotka</h2>
                        <p>Potiahnite sem obrázok</p>
                    </div>
                    <div id="drop">
                        <p>Presuňte sem obrázok</p>
                    </div>
                    <div id="gallery"></div>
                </div>
                <a class="btn btn-lg btn-dark w-100 fs-6" type="submit" name="submit" href=""><small>Potvrdiť</small></a>
            </div>

        </div>
    </div>
</main>

<script src="public/js/script.js"> </script>

</body>
</html>