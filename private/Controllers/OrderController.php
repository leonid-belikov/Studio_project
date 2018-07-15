<?php

namespace Leonid\Studio\Controllers;


use Leonid\Studio\Models\OrderModel;

class OrderController
{
    public function make_newAction () {
        $order = new OrderModel();
        echo $order->make_new_order();
    }

    public function show_uncAction () {
        $incOrders = new OrderModel();
        echo $incOrders->show_unc();
    }

    public function show_compAction () {
        $compOrders = new OrderModel();
        echo $compOrders->show_comp();
    }
}