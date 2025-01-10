<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\User;

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

        return $this->html();

    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("home.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
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
        return $this->html();
    }

    public function register(): Response
    {

        $name_first = $this->request()->getValue('name_first');
        $name_second = $this->request()->getValue('name_second');
        $email = $this->request()->getValue('email');
        $password = $this->request()->getValue('password');

        $user = new User();
        $user->setId(3);
        $user->setEmail($email);
        $user->setNameFirst($name_first);
        $user->setNameSecond($name_second);
        $user->setPassword($password);

        $user->save();
        return $this->redirect($this->url("auth.login"));
    }
}
