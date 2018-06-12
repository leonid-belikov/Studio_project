<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;
use Leonid\Studio\Models\AccountModel;


class AccountController extends Controller
{
    public function registrationAction() {
        $view = 'registration_view.php';
        $title = 'STUDIO. Регистрация';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }

    public function registration_userAction() {
        $reg = new AccountModel();
        echo $reg->reg_user("../private/data.txt");
    }

    public function authorization_userAction() {
        $auth = new AccountModel();
        echo $auth->auth_user("../private/data.txt");
    }

    public function authorizationAction() {
        $view = 'authorization_view.php';
        $title = 'STUDIO. Авторизация';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }

    public function userroomAction() {
        $view = 'userroom_view.php';
        $title = 'Личный кабинет';
        $this->generateResponse($view,
            [
                'title'=> $title,
            ]
        );
    }
}
