<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;

class ReservationController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html([
            'reservations' => Reservation::getAll()
        ]);

    }

    public function isLogged(): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    public function getUserID(): int
    {
        return $this->app->getAuth()->getLoggedUserId();
    }

    public function reserve(): Response
    {

        $id = $this->request()->getValue('id');
        $reservation = Reservation::getOne($id);
        $client_id = $this->app->getAuth()->getLoggedUserId();
        $reservation->setClientId($client_id);
        $reservation->save();

        return  $this->redirect($this->url('reservation.index'));

    }

    public function cancel_reservation(): Response
    {

        $id = $this->request()->getValue('id');
        $reservation = Reservation::getOne($id);
        $reservation->setClientId(null);
        $reservation->save();

        return  $this->redirect($this->url('reservation.index'));

    }
}