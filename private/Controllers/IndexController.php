<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;


class IndexController extends Controller
{
    public function indexAction(){
        session_start();
        if (!$_SESSION['auth']) {
            session_destroy();
        }
        $view = 'index_view.php';
        $title = 'Main';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }
}

