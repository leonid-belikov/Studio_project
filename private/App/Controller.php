<?php
namespace Leonid\Studio\App;



class Controller {


    protected function generateResponse($view, $data=[]){
        if (is_array($data)) {
            extract($data);
        }
        session_start();
        require_once "../private/Views/template.php";
    }
}