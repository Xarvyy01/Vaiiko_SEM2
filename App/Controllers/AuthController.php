<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\Picture;
use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
use App\Models\Authorization;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    public function registration(): Response
    {
        $errors = [];
        $errors = $this->request()->getValue('errors');

        if ($errors == null) {
            return $this->html(['error' => null]);
        }

        return $this->html(['error' => $errors[0]]);

    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['login']) && isset($formData['password'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("home.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý email alebo heslo!'] : ['message' => null]);
        return $this->html($data);
    }

    public function isLogged(): bool
    {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect($this->url('home.index'));
    }

    public function register(): Response
    {

        $name_first = $this->request()->getValue('name_first');
        $name_second = $this->request()->getValue('name_second');
        $email = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');
        $password_repeat = $this->request()->getValue('password_repeat');
        $pass = password_hash($password, PASSWORD_BCRYPT);

        $users = User::getAll();
        $final_user = null;
        $error = [];


        if ($this->isEmailCorrect($email)) {
            array_push($error, 'Máte zle napisaný email');
        }

        foreach ($users as $user) {
            if ($user->getEmail() == $email) {
                $final_user = $user;
                array_push($error, 'Účet s takýmto emailom už je zaregistrovaný');
            }
        }

        if (strlen($password < 8) || (preg_match('/\d/', $password)) == 0 || (preg_match('/[A-Z]/', $password) == 0)) {
            array_push($error, 'Heslo musí mať minimálne 8 znakov, 1 veľké písmeno, 1 číslo');
        }

        if ($password != $password_repeat) {
            array_push($error, 'Hesla nezhodujú');
        }

        if ($final_user == null && sizeof($error) == 0) {

            $user = new User();
            $user->setEmail($email);
            $user->setNameFirst($name_first);
            $user->setNameSecond($name_second);
            $user->setPassword($pass);

            $user->save();

            $user_id = $user->getId();
            $authorization = new Authorization();
            $authorization->setUserId($user_id);
            $authorization->setPermissionId(1);
            $authorization->save();


            return $this->redirect($this->url("auth.login"));

        }

        return $this->redirect($this->url('auth.registration', ["errors" => $error]));
    }

    public function delete(): Response
    {

        $id = $this->request()->getValue("id");



        $authorisations = Authorization::getAll();
        $reviews = Review::getAll();
        $reservations = Reservation::getAll();
        $pictures = Picture::getAll();

        foreach ($authorisations as $authorisation) {
            if ($authorisation->getUserId() == $id) {
                $authorisation->delete();
            }
        }

        foreach ($reviews as $review) {
            if ($review->getClientId() == $id) {
                $authorisation->delete();
            }
        }

        foreach ($reservations as $reservation) {
            if ($reservation->getClientId() == $id) {
                $authorisation->delete();
            }
        }

        foreach ($pictures as $picture) {
            if ($picture->getUserId() == $id) {
                $picture->delete();
            }
        }

        $user = User::getOne($id);
        $user->delete();

        return $this->redirect($this->url('admin.index'));

    }

    public function checkDuplicity()
    {
        $data = $this->request()->getRawBodyJSON();
        $email = $data->email;
        $users = User::getAll();
        $ret = false;
        foreach ($users as $user) {
            if ($user->getEmail() == $email) {
                $ret = true;
            }
        }


        return $this->json(["ret" => $ret]);

    }

    public function isEmailCorrect($email_temp) : bool
    {
        $index = -1;
        for ($i = 0; $i < strlen($email_temp); $i++) {
            if ($email_temp[$i] == '.') {
                $index = $i;
            }
        }

        $after_email = '';

        if (str_contains($email_temp,'@')) {
            for ($i = strpos($email_temp, '@'); $i < strlen($email_temp); $i++) {
                   $after_email = $after_email . '' . $email_temp[$i];
            }
        }


        if ($after_email != '' && strpos($email_temp, '@') < $index && strlen($after_email >= 4)) {
            return false;
        }
        return true;
    }

    public function checkDuplicityUsers(): \App\Core\Responses\JsonResponse
    {
        $data = $this->request()->getRawBodyJSON();
        $email = $data->email;

        $users = User::getAll();
        $ret = true;

        if (is_object($data) && property_exists($data, 'email')) {

            foreach ($users as $user) {

                if ($user->getEmail() == $email) {
                    $ret = false;
                }

            }

        }

        return $this->json(["ret" => $ret]);

    }
}
