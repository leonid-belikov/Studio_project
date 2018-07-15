<?php

namespace Leonid\Studio\Models;



use Leonid\Studio\App\DB;


class AccountModel {

    private $db;

    public function __construct() {
        $this->db = new DB();
    }

// Регистрация пользователя


    function reg_user() {

        $post = $_POST;
        $login = $post['reg_login'];
        $reg_pass = $post['reg_pass'];

        if (isset($login, $reg_pass)) {
            $this->registration($login, $reg_pass);
        }
    }


    private function registration($login, $pass){

        if ($this->data_in_base($login)) {
            echo "user already registered";
            return;
        }
        if (!$this->add_user($login, $pass)) {
            echo "user not add";
            return;
        }

        session_start();

//        $session = $_SESSION;
        $_SESSION['auth'] = true;
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;

        echo "user add";
        return;
    }


    private function data_in_base($login) {

        $sql = "SELECT Login FROM User WHERE Login= :login";
        $params = [
            'login' => $login
        ];
        if ($this->db->fetchData($sql, $params) === false) {
            return false;
        }
        return true;
    }


    private function add_user($login, $pass) {

        $hash = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO User (Login, Hash) VALUES (:login, :hash)";
        $params = [
            'login' => $login,
            'hash' => $hash
        ];
        return $this->db->executePrepareSql($sql, $params);

    }





//----------------------------------------------------------------
// Авторизация пользователя


    function auth_user(){

        $post = $_POST;
        $login = $post['auth_login'];
        $auth_pass = $post['auth_pass'];


        if (isset($login, $auth_pass)) {
            $this->authorization($login, $auth_pass);
        }
    }


    function authorization($login, $pass) {
        if (!$this->data_in_base($login)) {
            echo "user is not registered";
            return;
        }
        if (!$this->check_password($login, $pass)) {
            echo "wrong password";
            return;
        }

        session_start();

//        $session = $_SESSION;
        $_SESSION['auth'] = true;
//        $session['id_user'] = $this->get_user_id($login);
        $_SESSION['login'] = $login;
        $_SESSION['pass'] = $pass;
        echo 'login successful';
        return;
    }


    function check_password($login, $pass) {

        $sql = "SELECT Hash FROM User WHERE Login= :login";
        $params = [
            'login' => $login
        ];
        $resp = $this->db->fetchData($sql, $params);
        if (password_verify($pass, $resp['Hash'])) {
            return true;
        }

        return false;
    }


}