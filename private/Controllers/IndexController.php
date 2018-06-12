<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;


class IndexController extends Controller
{
    public function indexAction(){
        $view = 'index_view.php';
        $title = 'Studio';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }

    public function quitAction() {
        session_start();
        $_SESSION = [];
        $this->indexAction();
    }
}

