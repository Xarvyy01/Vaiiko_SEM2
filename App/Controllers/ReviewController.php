<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Review;

class ReviewController extends AControllerBase
{


    public function index(): Response
    {
        return $this->html([
            'reviews' => Review::getAll()
        ]);
    }

    public function addReview()
    {
        return $this->html();
    }

    public function save()
    {
        $picture = $this->request()->getValue('picture');
        $text = $this->request()->getValue('text');

        $review = new Review();
        $review->setText($text);
        $review->setPicture($picture);
        $review->save();


    }

}