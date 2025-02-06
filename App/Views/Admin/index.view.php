<?php

/** @var Array $data */

/** @var \App\Core\LinkGenerator $link */
/** @var \App\Models\User $user */
/** @var \App\Core\IAuthenticator $auth */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/contactpage_style.css">
    <link rel="stylesheet" href="public/css/usertable_style.css">
    <link rel="stylesheet" href="public/css/background.css">
    <link rel="stylesheet" href="public/css/box_contact.css">
    <title>Title</title>
</head>
<body>


<section class="bg-transparent p-4" id="section">
    <div class="container">
        <div class="row">
            <div class="col-12 contact-form" id="container">
                <div class="table-responsive text-center">
                    <table class="table table-striped table-hover table-bordered table-sm custom-table">
                        <thead class="custom-table-head">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Meno</th>
                            <th scope="col">Priezvisko</th>
                            <th scope="col">Email</th>
                            <th scope="col">Funkcie</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0; ?>
                        <?php foreach ($data['users'] as $user) : ?>
                            <tr>
                                <th scope="row"><?= ++$count ?></th>
                                <td><?= $user->getId() ?></td>
                                <td><?= $user->getNameFirst() ?></td>
                                <td><?= $user->getNameSecond() ?></td>
                                <td><?= $user->getEmail() ?></td>
                                <td class="d-flex gap-1">

                                       <?php
                                            if ($user->getId() != $auth->getLoggedUserId()) {
                                                echo ' <a class="btn btn-lg btn-outline-danger fs-6"  href="'. $link->url("auth.delete", ['id' => $user->getId()]) .'">
                                                    <small>Vymazať</small> </a>';
                                            }
                                       ?>



                                    <a class="btn btn-lg btn-dark fs-6"
                                       href="<?= $link->url("auth.changePassword", ['id' => $user->getId()]) ?>">
                                        <small>Resetovať Heslo</small>
                                    </a>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>




<script src="public/js/contact_script.js"> </script>

</body>
</html>