<?php

/** @var Array $data */

/** @var \App\Models\Reservation $reservation */
/** @var \App\Models\User $user */

/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Authorization $authorization */
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
    <link rel="stylesheet" href="public/css/fixedbutton.css">
    <link rel="stylesheet" href="public/css/error.css">
</head>
<body>

<div class="margin"></div>

<section id="testimonials">

    <div class="text-center">
        <?php if ($data['errors'] != null) {
            echo '<p class="text-center">' . $data['errors'][0] . '</p>';
        }
        ?>
    </div>

    <div class="testimonial-box-container">

    <?php foreach ($data['reservations'] as $reservation) : ?>


        <div class="testimonial-box">
            <div class="box-top justify-content-center">
                <div class="profile">
                    <div class="name-user">
                        <?php
                        echo '<strong class="text-center">' .$reservation->getTimeFrom(). '</strong>';
                        ?>

                        <?php
                            echo '<strong class="text-center">' . $reservation->getDate() . '</strong>';
                        ?>

                        <?php
                            if($reservation->getClientId() != null) {
                                foreach ($data['users'] as $user)
                                {
                                    if ($user->getId() == $reservation->getClientId()) {
                                        echo '<span class="text-center text-white">' .$user->getNameFirst(). ' ' .$user->getNameSecond(). '</span>';
                                    }
                                }

                            } else {
                                echo '<span class="text-center text-white"> Voľné </span>';
                            }

                        ?>

                    </div>
                </div>
            </div>


            <div class="row align-items-center justify-content-center gap-4">

                <?php
                if ($reservation->getClientId() == null) {
                        echo '<a style="width: 200px;" id="login_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.reserve", ["id" => $reservation->getId()]) . '">Rezervovať</a>';
                } else {

                    if ($auth->isLogged()) {
                        if ($reservation->getClientId() == $auth->getLoggedUserId()) {
                            echo '<a style="width: 200px;" id="login_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.cancel_reservation", ["id" => $reservation->getId()]) . '">Zruš Rezerváciu</a>';
                        }
                    } else {
                        echo '<p class="text-center">Termín už bol zarezervovaný!</p>';
                    }

                }
                ?>

                <?php
                if ($auth->isLogged()) {

                        if (($auth->isPermission("delete"))) {
                            echo ' <a style="width: 200px;" id="login_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.delete", ['id' => $reservation->getId()]) .'">Vymazať Termín</a>';
                        }
                        if (($auth->isPermission("admin"))) {
                            echo ' <a style="width: 200px;" id="cancel_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.cancel_reservation", ['id' => $reservation->getId()]) .'">Zruš Klienta</a>';
                        }

                }
                ?>

            </div>

        </div>

    <?php endforeach; ?>

    </div>

    <?php
    if ($auth->isLogged()) {
            if ($auth->isPermission("admin")) {
                echo '<a class="fixed-button" href="'. $link->url('reservation.addReservation') .'">Pridaj Termín</a>';
            }
    }
    ?>


</section>
<script src="public/js/reserve.js"></script>
</body>
</html>