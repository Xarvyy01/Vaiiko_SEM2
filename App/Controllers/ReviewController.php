<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Review;
use App\Models\User;
use App\Models\Authorization;

class ReviewController extends AControllerBase
{

    public function authorize(string $action)
    {
        switch ($action) {

            case "add_review":
            case "save": {
                if ($this->app->getAuth()->isLogged()) {
                    return true;
                }
                return false;
            }
            case "delete":
            case "redirectEdit": {
                if ($this->app->getAuth()->isLogged()) {

                    $id = $this->request()->getValue('id');
                    $review = Review::getOne($id);

                    $authorizations = Authorization::getAll();
                    foreach ($authorizations as $authorization) {
                        if ($authorization->getUserId() == $this->app->getAuth()->getLoggedUserId() && $this->app->getAuth()->getLoggedUserId() == $review->getClientId()) {
                            return true;
                        }
                    }
                }
                return false;
            }
            default: { return true; }

        }
    }

    public function index(): Response
    {
        return $this->html([
            'reviews' => Review::getAll(),
            'users' => User::getAll()
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
        return $this->html([
            'reviews' => Review::getAll(),
            'users' => User::getAll()
        ]);
    }

    public function save(): Response
    {
        $name = $this->request()->getValue('name');
        $rating = $this->request()->getValue('rating');
        $sentiment = $this->request()->getValue('sentiment');
        $messaage = $this->request()->getValue('message');

        $review = new Review();
        if (is_numeric($name)) {
            $review->setId($name);
        }

        $review->setDate((int) date('Ymd'));

        if (is_numeric($rating) && ($rating >= 0 && $rating <= 10)) {
            $review->setRating($rating);
        }

        if (is_numeric($sentiment) && ($sentiment >= 0 && $sentiment <= 1)) {
            $review->setsentiment($sentiment);
        }
        $review->setClientId($this->app->getAuth()->getLoggedUserId());
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

