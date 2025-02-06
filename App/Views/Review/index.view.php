<?php

/** @var Array $data */
/** @var \App\Models\Review $review */
/** @var \App\Models\User $user */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Models\Authorization $authorization */
/** @var \App\Core\LinkGenerator $link */
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
</head>
<body>

<div class="margin"></div>

<section id="testimonials">

    <div class="testimonial-box-container">

        <?php foreach ($data['reviews'] as $review) : ?>

        <div class="testimonial-box">
            <div class="box-top">
                <div class="profile">
                    <div class="name-user">
                        <strong class="align-right"> <?= $review->getRating() ?>/10 </strong>
                        <?php
                            foreach ($data['users'] as $user)
                                {
                                    if ($user->getId() == $review->getClientId()) {
                                        $userFirstName = $user->getNameFirst();
                                        $userSecondName = $user->getNameSecond();
                                    }
                                }
                                echo '<span class="text-center"> ' .$userFirstName. ' ' .$userSecondName. '</span>';

                        ?>
                        <?php

                        $dateString = $review->getDate();
                        $year = substr($dateString, 0, 4);
                        $month = substr($dateString, 4, 2);
                        $day = substr($dateString, 6, 2);


                        $formattedDate = $day . '.' . $month . '.' . $year;
                        echo '<span>' . $formattedDate . '</span>';
                        ?>

                    </div>
                </div>
            </div>
            <div class="client-comment">
                <p><?= $review->getText() ?></p>
            </div>

            <div class="row align-items-center justify-content-center gap-4">

                <?php
                    if ($auth->isLogged()) {
                        if ($review->getClientId() == $auth->getLoggedUserId()) {
                            echo '<a href="' . $link->url('review.redirectEdit', ['id' => $review->getId()]) .'" style="width: 200px;" id="login_button" class="btn btn-lg btn-dark fs-6">Upraviť</a>';
                            echo '<a href="' . $link->url('review.delete', ['id' => $review->getId()]) .'" style="width: 200px;" id="delete_button" class="btn btn-lg btn-dark fs-6">Zmazať</a>';
                        }
                    }

                ?>

            </div>

        </div>

        <?php endforeach; ?>

    </div>

    <?php
    if ($auth->isLogged()) {
        echo '<a class="fixed-button" href="'. $link->url('review.addReview') .'">Pridaj Recenziu</a>';
    }
    ?>

</section>
</body>

</html>