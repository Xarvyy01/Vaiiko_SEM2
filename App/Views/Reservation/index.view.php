<?php

/** @var Array $data */

/** @var \App\Models\Reservation $reservation */

/** @var \App\Core\LinkGenerator $link */
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
    <link rel="stylesheet" href="public/css/reviewpage_style.css">
</head>
<body>

<div class="margin"></div>

<section id="testimonials">

    <div class="testimonial-box-container">

    <?php foreach ($data['reservations'] as $reservation) : ?>


        <div class="testimonial-box">
            <div class="box-top">
                <div class="profile">
                    <div class="name-user">
                        <strong class="align-right"> afdwaf/10 </strong>
                        <span> @ fawfawf</span>
                        <span> wafawf</span>
                    </div>
                </div>
            </div>
            <div class="client-comment">
                <p>wfawfwafawf</p>
            </div>

            <div class="row align-items-center justify-content-center gap-4">

                <?php
                if ($reservation->getClientId() == null) {
                    echo '<a style="width: 200px;" id="login_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.reserve", ["id" => $reservation->getId()]) . '">Rezervovať</a>';
                } else {
                    if ($reservation->getClientId() == $auth->getLoggedUserId()) {
                        echo '<a style="width: 200px;" id="login_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.cancel_reservation", ["id" => $reservation->getId()]) . '">Zruš Rezerváciu</a>';
                    } else {
                        echo '<p class="text-center">Termín už bol zarezervovaný!</p>';
                    }
                }
                ?>

            </div>

        </div>

    <?php endforeach; ?>

    </div>

</section>
</body>
</html>