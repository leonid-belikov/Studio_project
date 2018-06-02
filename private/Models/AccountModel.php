<?php

namespace Leonid\Studio\Models;


class AccountModel {


// Регистрация пользователя


    function reg_user($filePath){

        $post = $_POST;
        $reg_login = $post['reg_login'];
        $reg_pass = $post['reg_pass'];

        if (isset($reg_login, $reg_pass)) {
            $this->registration($reg_login, $reg_pass, $filePath);
        }
    }


    private function registration($login, $pass, $path){

        if ($this->data_in_file($login, $path)) {
            echo "user already registered";
            return;
        }
        if (!$this->add_user($login, $pass, $path)) {
            echo "user not add";
            return;
        }
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        echo "user add";
        var_dump($_SESSION);
        return;
    }


    private function data_in_file($login, $path){
        $str = file_get_contents($path);
        $from_file = explode(";", $str);
        foreach ($from_file as $val) {
            $item = explode(",", $val);
            if ($login == $item[0]) {
                return true;
            }
        }
        return false;
    }


    private function add_user($login, $pass, $path){
        $pass = password_hash($pass,PASSWORD_DEFAULT);
        $str = "$login,$pass;";
        if (file_put_contents($path, $str,FILE_APPEND) === false) {
            return false;
        }
        return true;
    }


//----------------------------------------------------------------
// Авторизация пользователя


    function auth_user($filePath){

        $post = $_POST;
        $auth_login = $post['auth_login'];
        $auth_pass = $post['auth_pass'];


        if (isset($auth_login, $auth_pass)) {
            $this->authorization($auth_login, $auth_pass, $filePath);
        }
    }


    private function authorization($login, $pass, $path) {
        if (!$this->data_in_file($login, $path)) {
            echo "user is not registered";
            return;
        }
        if (!$this->check_password($pass, $path)) {
            echo "wrong password";
            return;
        }
        session_start();
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        echo 'login successful';
        var_dump($_SESSION);
        return;
    }


    function check_password($pass, $path){
        $str = file_get_contents($path);
        $from_file = explode(";", $str);
        foreach ($from_file as $val) {
            $item = explode(",", $val);
            if (password_verify($pass, $item[1])) {
                return true;
            }
        }
        return false;
    }
}