<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{
    protected ?int $id;
    protected ?string $text = null;
    protected ?int $date = null;
    protected ?int $sentiment = null;
    protected ?int $rating = null;
    protected ?int $client_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function getSentiment(): ?int
    {
        return $this->sentiment;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function setDate(?int $date): void
    {
        $this->date = $date;
    }

    public function setSentiment(?bool $sentiment): void
    {
        $this->sentiment = $sentiment;
    }

    public function setRating(?int $rating): void
    {
        $this->rating = $rating;
    }

    public static function getTableName(): string
    {
        return "reviews";
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