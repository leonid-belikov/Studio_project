<?php


namespace Leonid\Studio\Controllers;


use Leonid\Studio\Models\AdminModel;

class AdminController
{
    public function viewOrdersAction () {
        $ordersList = new AdminModel();
        echo $ordersList->showOrders();
    }

    public function viewUsersAction () {
        $ordersList = new AdminModel();
        echo $ordersList->showUsers();
    }

    public function change_statusAction () {
        $post = $_POST;

        $chgngStatus = new AdminModel();
        $orderNum = $post['changing-order'];
        $orderStatus = $post['changing-status'];
        echo $chgngStatus->changeStatus($orderNum, $orderStatus);
    }
}