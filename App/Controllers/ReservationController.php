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
            case "addReservation":
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
        $errors = $this->request()->getValue('errors');
        return $this->html([
            'reservations' => Reservation::getAll(),
            'users' => User::getAll(),
            'authorizations' => Authorization::getAll(),
            'errors' => $errors
        ]);

    }

    public function addReservation(): Response
    {
        $errors = $this->request()->getValue('errors');

        return $this->html(['errors' => $errors]);


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

        $reservations = Reservation::getAll("client_id=?", [$this->app->getAuth()->getLoggedUserId()]);
        $count = 0;
        $errors = [];



        if ($reservations == null) {
            $id = $this->request()->getValue('id');
            $reservation = Reservation::getOne($id);
            $client_id = $this->app->getAuth()->getLoggedUserId();
            $reservation->setClientId($client_id);
            $reservation->save();
        } else {
            array_push($errors, 'Už máte rezervovaný termín');
        }



        return  $this->redirect($this->url('reservation.index', ['errors' => $errors]));

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
        $reservation = new Reservation();

        $errors = [];

        $timeFrom = $this->request()->getValue('timeFrom');
        $date = $this->request()->getValue('date');

        $firstHalf = '';
        $secondHalf = '';
        $thirdhalf = '';
        $switch = 0;

        if (strpos($timeFrom, ':')) {

            for ($i = 0; $i < strlen($timeFrom); $i++) {

                if ($timeFrom[$i] == ':') {
                    $switch = 1;
                } else {
                    if ($switch == 0) {
                        $firstHalf = $firstHalf . $timeFrom[$i];
                    } else {
                        $secondHalf = $secondHalf . $timeFrom[$i];
                    }
                }

            }

        }

        if (strlen($firstHalf) == 2 && strlen($secondHalf) == 2 && is_numeric($firstHalf) && is_numeric($secondHalf) && (int) $firstHalf >= 0 && (int) $firstHalf <= 23 && (int) $firstHalf >= 0 && (int) $firstHalf <= 59)
        {
            $reservation->setTimeFrom($timeFrom);
        } else {
            array_push($errors , "Zle naformatovaný čas | príklad => 12:30");
        }

        $parts = explode('.', $date);

        if ((int) $parts[0] >= 1 && (int) $parts[0] <= 31 && (int) $parts[1] >= 1 && (int) $parts[1] <= 12 && (int) $parts[2] == 2025 && is_numeric($parts[0]) && is_numeric($parts[1]) && is_numeric($parts[2])) {
            $reservation->setDate($date);
        } else {
            array_push($errors , "Zle naformatovaný dátum | príklad => 13.2.2025");
        }

        if (sizeof($errors) == 0) {
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