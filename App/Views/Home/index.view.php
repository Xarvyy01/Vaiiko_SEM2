<?php

/** @var Array $data */

/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/homepage_style.css">
    <title>Home Page</title>
</head>
<body>

<div class="margin"></div>

<h1 class="title">Salón Sisa</h1>

<div class="container-fluid mt-4">
    <div class="row">

        <div class="col-md-6 text_s">
            <h2>Vítajte na stránke Salónu Sisa</h2>
            <p>-----------------------------------------------------------</p>
            <p class="text-small"> V Salóne Sisa veríme, že každý si zaslúži byť krásny a cítiť sa výnimočne. </p>
            <p class="text-small"> Naša odborná tím je tu, aby vám poskytol skvelé služby a aj poraditeľstvo.</p>
            <p class="text-small"> Ak hľadáte moderný účes, manikúru, alebo si chcete dopriať relaxačné masáže,</p>
            <p class="text-small"> naša ponuka služieb pokryje všetky vaše potreby, ktoré budete požadovať. </p>
            <p class="text-small"> Naše služby: </p>
            <p class="text-small"> - Účesy a strihy: Naši skúsení kaderníci vás obdarujú účesom, ktorý bude vyhovovať vášmu vonkajšiemu vzhľadu. </p>
            <p class="text-small"> - Manikúra a pedikúra: Od klasických po moderné techniky. Vaše ruky a nohy budú vyzerať krásne a upravené. </p>
            <p class="text-small"> - Kosmetika: Naše kozmetičky vám poskytnú starostlivosť o pleť, ktorá vás rozžiari. </p>
            <p class="text-small"> - Masáže: Uvoľnite sa a zbavte sa stresu s našimi relaxačnými masážami. </p>
            <p class="text-small"> - Príďte navštíviť náš salón a zažite profesionálny prístup a príjemnú atmosféru. Tešíme sa na vašu návštevu! </p>
            <p class="text-small"> - Pre viac informácií nás neváhajte kontaktovať. </p>
        </div>

        <div class="col-md-6">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="public/images/1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="public/images/5.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
</div>


</body>
</html>