<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\App\Controller;


class ContactsController extends Controller
{
    public function indexAction() {
        $view = 'contacts_view.php';
        $title = 'STUDIO. Contacts';
        $this->generateResponse($view, [
            'title'=> $title,
        ]);
    }
}