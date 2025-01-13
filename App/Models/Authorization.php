<?php

namespace App\Models;

use App\Core\Model;

class Authorization extends Model
{
    protected ?int $id;
    protected ?int $user_id = null;
    protected ?float $permission_id= null;

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): void
    {
        $this->user_id = $user_id;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPermissionId(): ?float
    {
        return $this->permission_id;
    }

    public function setPermissionId(?float $permission_id): void
    {
        $this->permission_id = $permission_id;
    }


}