<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;


class PortfolioController extends Controller {

    public function indexAction() {
        $view = 'portfolio_view.php';
        $title = 'STUDIO. Portfolio';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }
}

