<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;


class IndexController extends Controller
{
    public function indexAction(){
        $view = 'index_view.php';
        $title = 'Main';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }
}

