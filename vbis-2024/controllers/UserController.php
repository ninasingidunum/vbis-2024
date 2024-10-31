<?php

namespace app\controllers;

use app\core\BaseController;

use app\models\UserModel;

class UserController extends BaseController
{
    public function readUser()
    {
        $model = new UserModel();
        $model->email = 'pbisevac@singidunum.ac.rs';
        $model->firstName = 'Nina';
        $model->lastName = 'Petrovic';

        echo "<pre>";
        var_dump($model);
        exit;

        $this->view->render('getUser', 'main', $model);
    }
}