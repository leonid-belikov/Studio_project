<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;
use Leonid\Studio\Models\AccountModel;


class AccountController extends Controller
{
    public function registrationAction() {
        $view = 'registration_view.php';
        $title = 'Registration';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }

    public function registration_userAction() {
        $reg = new AccountModel();
        echo $reg->reg_user();
    }

    public function authorization_userAction() {
        $auth = new AccountModel();
        echo $auth->auth_user();
    }

    public function authorizationAction() {
        $view = 'authorization_view.php';
        $title = 'Log In';
        $this->generateResponse($view,
            [
                'title'=> $title,
            ]
        );
    }

    public function userroomAction() {
        session_start();
        if (!$_SESSION['auth']){
            session_destroy();
            return;
        }
        $view = 'userroom_view.php';
        $title = 'Personal cabinet';
        $this->generateResponse($view,
            [
                'title'=> $title,
            ]
        );
    }

    public function adminroomAction() {
        session_start();
        if (!$_SESSION['auth']){
            session_destroy();
            return;
        }
        $view = 'adminroom_view.php';
        $title = 'Administration';
        $this->generateResponse($view,
            [
                'title'=> $title,
            ]
        );
    }
};
