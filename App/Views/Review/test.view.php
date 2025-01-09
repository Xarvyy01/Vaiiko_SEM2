<?php

/** @var Array $data */
/** @var \App\Models\Review $review */
/** @var \App\Models\User $user */

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
    <?php foreach ($data['users'] as $user) : ?>
    <?php endforeach; ?>

    <?php foreach ($data['reviews'] as $review) : ?>
        <div class="col-3 d-flex gap-4 flex-column">
            <div class="border post d-flex flex-column">
                <div class="m-2">
                    <?= $review->getId() ?>
                </div>
                <div class="m-2">
                    <?= $review->getText() ?>
                </div>
                <div class="m-2 d-flex gap-2 justify-content-end">
                    <a href="" class="btn btn-primary">Upraviť</a>
                    <a href="" class="btn btn-danger">Zmazať</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</main>

</body>
</html>