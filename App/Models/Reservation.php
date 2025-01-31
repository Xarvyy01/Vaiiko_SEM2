<?php

namespace App\Models;

use App\Core\Model;

class Reservation extends Model
{

    protected ?int $id;
    protected ?string $date = null;
    protected ?string $time_from = null;
    protected ?int $client_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    public function getTimeFrom(): ?string
    {
        return $this->time_from;
    }

    public function setTimeFrom(?string $time_from): void
    {
        $this->time_from = $time_from;
    }

    public function getTimeTo(): ?float
    {
        return $this->time_to;
    }


    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    public function setClientId(?int $client_id): void
    {
        $this->client_id = $client_id;
    }

}