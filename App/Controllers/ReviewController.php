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

    public function addReview() : Response
    {
        $id = $this->request()->getValue('id');
        $review = Review::getOne($id);
        return $this->html([
            'review' => $review
        ]);
    }

    public function test()
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
        return  $this->redirect($this->url('review.index'));
    }

    public function delete(): Response
    {
        $id = $this->request()->getValue('id');
        $review = Review::getOne($id);
        $review->delete();
        return $this->redirect($this->url("review.index"));
    }

    public function edit(): Response
    {
        $id = $this->request()->getValue('name');
        $review = Review::getOne($id);
        $review->setText($this->request()->getValue('message'));
        $review->setSentiment($this->request()->getValue('sentiment'));
        $review->setRating($this->request()->getValue('rating'));

        $review->save();
        return $this->redirect($this->url("review.index"));
    }

    public function redirectEdit(): Response
    {
        $id = $this->request()->getValue('id');

        return $this->redirect($this->url("review.addReview", ["id" => $id]));

    }
}

