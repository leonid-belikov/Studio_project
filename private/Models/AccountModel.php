<?php

namespace Leonid\Studio\Models;


class AccountModel {

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
        echo "user add";
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
}
