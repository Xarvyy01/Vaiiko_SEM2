<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    protected ?int $id;
    protected ?string $email = null;
    protected ?string $name_first = null;
    protected ?string $name_second = null;
    protected ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getNameFirst(): ?string
    {
        return $this->name_first;
    }

    public function setNameFirst(?string $name_first): void
    {
        $this->name_first = $name_first;
    }

    public function getNameSecond(): ?string
    {
        return $this->name_second;
    }

    public function setNameSecond(?string $name_second): void
    {
        $this->name_second = $name_second;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public static function getTableName(): string
    {
        return "users";
    }

}