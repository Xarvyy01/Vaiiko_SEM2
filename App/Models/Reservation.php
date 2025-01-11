<?php

namespace App\Models;

use App\Core\Model;

class Reservation extends Model
{

    protected ?int $id;
    protected ?int $date = null;
    protected ?float $time_from = null;
    protected ?float $time_to = null;
    protected ?int $client_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    public function getTimeFrom(): ?float
    {
        return $this->time_from;
    }

    public function setTimeFrom(?float $time_from): void
    {
        $this->time_from = $time_from;
    }

    public function getTimeTo(): ?float
    {
        return $this->time_to;
    }

    public function setTimeTo(?float $time_to): void
    {
        $this->time_to = $time_to;
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