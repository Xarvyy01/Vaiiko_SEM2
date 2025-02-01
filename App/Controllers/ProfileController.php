<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Picture;
use App\Models\User;

class ProfileController extends AControllerBase
{

    public function index(): Response
    {

        $user = User::getOne($this->app->getAuth()->getLoggedUserId());
        $pictures = Picture::getAll();
        $code = '';

        foreach ($pictures as $picture) {
            if ($picture->getUserId() == $user->getId()) {
                $code = $picture->getCode();
            }
        }

        if ($code != '') {
            $code = 'data:image/jpeg;base64,' . base64_encode($code);
        }

            $data = [
            "name" => $user->getNameFirst() . ' ' . $user->getNameSecond(),
            "email" => $user->getEmail(),
            "id" => $user->getId(),
            "picture" => $code,
        ];

        return $this->html($data);
    }
}