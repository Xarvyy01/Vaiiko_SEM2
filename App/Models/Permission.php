<?php

namespace App\Models;

use App\Core\Model;

class Permission extends Model
{
    protected ?int $id;
    protected ?string $permission;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(?string $permission): void
    {
        $this->permission = $permission;
    }



}