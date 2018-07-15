<?php

namespace Leonid\Studio\Models;



use Leonid\Studio\App\DB;


class OrderModel
{
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    function make_new_order () {

        session_start();
        $post = $_POST;
        $session = $_SESSION;

        $user = $session['login'];

        $title = $post['order-title'];
        $specific = $post['order-specific'];
        $status = 'In processing';
        $deadline = $post['order-deadline'];
        $cost = $post['order-cost'];
        $order_date = date('y') . "." . date('m') . "." . date('d');


        if ($this->add_order($user, $title, $specific, $status, $deadline, $cost, $order_date))
            return $this->db->get_last_id();
        else
            return 'Smth wrong';
    }


    private function add_order($user, $title, $specific, $status, $deadline, $cost, $order_date) {

        $sql = "INSERT INTO OrderProject (user, title, specification, status, deadline, cost, orderDate)
                VALUES (:user, :title, :specific, :status, :deadline, :cost, :order_date)";
        $params = [
            'user' => $user,
            'title' => $title,
            'specific' => $specific,
            'status' => $status,
            'deadline' => $deadline,
            'cost' => $cost,
            'order_date' => $order_date
        ];

        return ($this->db->executePrepareSql($sql, $params));

    }


    function show_unc() {

        session_start();
        $session = $_SESSION;

        $user = $session['login'];

        $sql = "SELECT * FROM OrderProject WHERE user = :user AND status != 'ready'";
        $params = [
            'user' => $user
        ];

        $resp = $this->db->fetchAllData($sql, $params);

        return json_encode($resp, JSON_UNESCAPED_LINE_TERMINATORS);

    }


    function show_comp() {

        session_start();
        $session = $_SESSION;

        $user = $session['login'];

        $sql = "SELECT * FROM OrderProject WHERE user = :user AND status = 'ready'";
        $params = [
            'user' => $user
        ];

        $resp = $this->db->fetchAllData($sql, $params);

        return json_encode($resp, JSON_UNESCAPED_LINE_TERMINATORS);

    }

}