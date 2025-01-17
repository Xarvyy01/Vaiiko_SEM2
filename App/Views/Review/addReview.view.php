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
    <link rel="stylesheet" href="public/css/loginpage_style.css">
    <title>Boostrap Login | Ludiflex</title>
</head>
<body>

<main>



    <div class="container d-flex justify-content-center align-items-center">


        <?php if ($data['review'] !== null): ?>
        <form method="post" action="<?= $link->url('review.edit')?>">
            <div class="row border rounded-5 p-3 shadow box-area">
                <div class="col-md-12 right-box">
                    <div class="row align-items-center">

                        <div class="header-text mb-4">
                            <h2>Recenzia</h2>
                            <p>Môžete nás ohodnotiť a poradiť nám čo by sme mohli zepšiť</p>
                        </div>
                        <div class="input-group mb-4">
                            <input id="rating" name="rating" type="text" class="form-control form-control-lg bg-light fs-6" value="<?=htmlspecialchars($data['review']->getRating()) ?>">
                        </div>
                        <div class="input-group">
                            <textarea class="form-control mb-3" name="message" id="text" style="height: 7em; resize: none;"><?=htmlspecialchars($data['review']->getText())?></textarea>
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                        </div>
                        <div class="input-group mb-3">
                            <button id="login_button" class="btn btn-lg btn-dark w-100 fs-6">Pridať</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php else: ?>
            <form method="post" action="<?= $link->url('review.save')?>">
             <div class="row border rounded-5 p-3 shadow box-area">

                <div class="col-md-12 right-box">
                    <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h2>Recenzia</h2>
                            <p>Môžete nás ohodnotiť a poradiť nám čo by sme mohli zepšiť</p>
                        </div>
                        <div class="input-group mb-4">
                            <input id="rating" name="rating" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Koľko bodov z 10?">
                        </div>
                        <div class="input-group">
                            <textarea class="form-control mb-3" id="text" name="message" placeholder="Message" style="height: 7em; resize: none;"></textarea>
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                        </div>
                        <div class="input-group mb-3">
                            <button id="login_button" class="btn btn-lg btn-dark w-100 fs-6">Pridať</button>
                        </div>
                    </div>
                </div>

             </div>
            </form>
        <?php endif; ?>



    </div>

    <div class="text-center">
        <?php if ($data['ret'] != null) {
            echo '<p>"' . $data['ret'] . '"</p>';
        }
        ?>
    </div>

</main>

<script src="public/js/review_script.js"></script>

</body>
</html>