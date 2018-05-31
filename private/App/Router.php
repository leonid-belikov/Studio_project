<?php
namespace Leonid\Studio\App;



class Router
{
    static function run($controllers_namespace) {
        $controller = 'Index';
        $action = 'index';
        $get = null;

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if(!empty($routes[1])) {
            $controller = $routes[1];
        }
        if(!empty($routes[2])) {
            $action = $routes[2];
        }
        if(!empty($routes[3])) {
            $get = $routes[3];
        }

        $controller =
            $controllers_namespace .
            ucfirst(strtolower($controller)) .
            'Controller';
        //Leonid\Studio\Controllers\IndexController

        $action = strtolower($action) . 'Action';
        //indexAction

        if (class_exists($controller)) {
            $controller = new $controller();
        } else {
            var_dump('Класса не существует');
        }

        if(method_exists($controller, $action)) {
            $controller->$action($get);
        } else {
            var_dump('Метода не существует');
        }
    }
}