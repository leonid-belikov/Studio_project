<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;


class IndexController extends Controller
{
    public function indexAction(){
        session_start();
        if (!isset ($_SESSION['auth'])) {
            session_destroy();
        } else {
            echo "Пользователь авторизован";
        }
        $view = 'index_view.php';
        $title = 'Main';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }
}

