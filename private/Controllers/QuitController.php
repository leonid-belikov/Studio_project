<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;



class QuitController extends Controller
{
    public function indexAction(){
        session_start();
        $_SESSION = [];
        $view = 'index_view.php';
        $title = 'Main';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);

    }
}

