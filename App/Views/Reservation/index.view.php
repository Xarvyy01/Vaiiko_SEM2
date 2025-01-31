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
</head>
<body>

<div class="margin"></div>

<section id="testimonials">

    <div class="testimonial-box-container">

    <?php foreach ($data['reservations'] as $reservation) : ?>


        <div class="testimonial-box">
            <div class="box-top justify-content-center">
                <div class="profile">
                    <div class="name-user">
                        <?php

                        $timeString = $reservation->getTimeFrom();



                        echo '<strong class="text-center">' .$timeString. '</strong>';

                        ?>

                        <?php

                            $dateString = $reservation->getDate();

                            echo '<strong class="text-center">' . $dateString . '</strong>';

                        ?>

                        <?php

                            if($reservation->getClientId() != null) {
                                foreach ($data['users'] as $user)
                                {
                                    if ($user->getId() == $reservation->getClientId()) {
                                        $userFirstName = $user->getNameFirst();
                                        $userSecondName = $user->getNameSecond();
                                    }
                                }
                                echo '<span class="text-center">' .$userFirstName. ' ' .$userSecondName. '</span>';
                            } else {
                                echo '<span class="text-center"> Voľné </span>';
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
                    foreach ($data['authorizations'] as $authorization) {
                        if ($authorization->getUserId() == $auth->getLoggedUserId() && ($authorization->getPermissionId() == "3")) {
                            echo ' <a style="width: 200px;" id="login_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.delete", ['id' => $reservation->getId()]) .'">Vymazať Termín</a>';
                        }
                        if ($authorization->getUserId() == $auth->getLoggedUserId() && ($authorization->getPermissionId() == "4")) {
                            echo ' <a style="width: 200px;" id="cancel_button" class="btn btn-lg btn-dark fs-6" href="' . $link->url("reservation.cancel_reservation", ['id' => $reservation->getId()]) .'">Zruš Klienta</a>';
                        }
                    }
                }
                ?>

            </div>

        </div>

    <?php endforeach; ?>

    </div>

</section>
<script src="public/js/reserve.js"></script>
</body>
</html>