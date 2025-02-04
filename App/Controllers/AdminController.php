<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class AdminController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        if ($this->app->getAuth()->isLogged()) {
            $authorizations = \App\Models\Authorization::getAll();
            foreach ($authorizations as $authorization) {
                if ($authorization->getUserId() == $this->app->getAuth()->getLoggedUserId() && $authorization->getPermissionId() == "4") {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        $users = User::getAll();
        return $this->html(['users' => $users]);
    }
}
