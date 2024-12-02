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

    public function save(): Response
    {
        $name = $this->request()->getValue('name');
        $rating = $this->request()->getValue('rating');
        $sentiment = $this->request()->getValue('sentiment');
        $messaage = $this->request()->getValue('message');

        $review = new Review();
        $review->setId($name);
        $review->setDate(2131331);
        $review->setRating($rating);
        $review->setSentiment($sentiment);
        $review->setText($messaage);
        $review->save();
        return  $this->redirect($this->url('review.addReview'));
    }

}