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

            case "addReview": {
                if ($this->app->getAuth()->isLogged()) {
                    return true;
                }
                return false;
            }
            case "save": {
                if ($this->app->getAuth()->isLogged() && $this->hasUserReview($this->app->getAuth()->getLoggedUserId()) == false) {
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
            'users' => User::getAll(),
            'authorizations' => Authorization::getAll(),
        ]);
    }

    public function addReview() : Response
    {
        $id = $this->request()->getValue('id');
        $errors = $this->request()->getValue('errors');


        if ($id == null) {
            return $this->html([
                'errors' => $errors,
                'review' => null
            ]);
        } else {
            $review = Review::getOne($id);
            return $this->html([
                'review' => $review,
                'errors' => $errors
            ]);
        }

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
        $messaage = $this->request()->getValue('message');

        $errors = [];

        $review = new Review();

        $review->setDate((int) date('Ymd'));

        if (is_numeric($rating) && ($rating >= 0 && $rating <= 10)) {
            $review->setRating($rating);
        } else {
            array_push($errors,'Zlé hodnotenie číslo musí byť od 1 až po 10');
            return $this->redirect($this->url("review.addReview", ["errors" => $errors]));
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
        foreach (Review::getAll() as $review_temp) {
            if ($review_temp->getClientId() == $this->app->getAuth()->getLoggedUserId()) {
                $id = $review_temp->getId();
            }
        }
        $review = Review::getOne($id);
        $review->setText($this->request()->getValue('message'));
        $review->setRating($this->request()->getValue('rating'));

        $review->save();
        return $this->redirect($this->url("review.index"));
    }

    public function redirectEdit(): Response
    {
        $id = $this->request()->getValue('id');

        return $this->redirect($this->url("review.addReview", ["id" => $id]));

    }

    public function hasUserReview($userId) : bool
    {

        $reviews = Review::getAll();

        foreach ($reviews as $review) {
            if ($review->getClientId() == $userId) {
                return true;
            }
        }


        return false;
    }
}

