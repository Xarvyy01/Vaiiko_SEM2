<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

use App\Models\Authorization;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;


class ReservationController extends AControllerBase
{

    public function authorize(string $action)
    {
        switch ($action) {

            case "cancel_reservation":
            case "reserve": {
                if ($this->app->getAuth()->isLogged()) {
                    $authorizations = Authorization::getAll();
                    foreach ($authorizations as $authorization) {
                        if ($authorization->getUserId() == $this->app->getAuth()->getLoggedUserId() && $authorization->getPermissionId() == "1") {
                            return true;
                        }
                    }
                }
                return false;
            }
            case "add":
            case "delete": {
                if ($this->app->getAuth()->isLogged()) {
                    $authorizations = Authorization::getAll();
                    foreach ($authorizations as $authorization) {
                        if ($authorization->getUserId() == $this->app->getAuth()->getLoggedUserId() && $authorization->getPermissionId() == "4") {
                            return true;
                        }
                    }
                }
                return false;
                }
            default: { return true; }

        }
    }

    public function index(): Response
    {
        return $this->html([
            'reservations' => Reservation::getAll(),
            'users' => User::getAll(),
            'authorizations' => Authorization::getAll()
        ]);

    }

    public function addReservation(): Response
    {
        $err1 = $this->request()->getValue('err1');
        $err2 = $this->request()->getValue('err2');

        if ($err1 != null || $err2 != null) {
            return $this->html([
                'err1' => $err1,
                'err2' => $err2
            ]);
        } else {
            return $this->html([
                'err1' => null,
                'err2' => null
            ]);
        }

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

    public function add(): Response
    {
        $boolean = false;
        $reservation = new Reservation();
        $timeFrom = $this->request()->getValue('timeFrom');

        $errors = [];
        $error2 = '';

        $date = $this->request()->getValue('date');

        if (is_numeric($timeFrom)) {
            $reservation->setTimeFrom($timeFrom);
        } else {
            $boolean = true;
            array_push($errors, 'Musí byť číslo vo formáte napríklad 12:30');
        }


        if (strlen($date) == 8 && ctype_digit($date)) {
            $reservation->setDate($date);
        } else {
            $boolean = true;
            array_push($errors, 'Dátum musí byť vo forme YYMMDD priklad: 20250110');
        }

        if ($boolean == false) {
            $reservation->save();
            return  $this->redirect($this->url('reservation.index'));
        }

        return $this->redirect($this->url('reservation.addReservation', ["errors" => $errors]));

    }

    public function delete(): Response
    {
        $id = $this->request()->getValue('id');
        $reservation = Reservation::getOne($id);
        $reservation->delete();
        return  $this->redirect($this->url('reservation.index'));

    }


    public function getReservationCount(): int
    {

        if ($this->app->getAuth()->isLogged()) {

            $reservations = Reservation::getAll();
            $user = User::getOne($this->app->getAuth()->getLoggedUserId());

            $count = 0;

            foreach ($reservations as $reservation) {
                if ($reservation->getClientId()== $user->getId()) { $count = $count + 1; }
            }

            return $count;

        }

        return 0;

    }
}