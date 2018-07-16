<?php
namespace Leonid\Studio\Models;



use Leonid\Studio\App\DB;

class AdminModel
{
    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    public function showOrders () {

        $sql = "SELECT * FROM OrderProject";

        $resp = $this->db->query($sql);

        return json_encode($resp, JSON_UNESCAPED_LINE_TERMINATORS);
    }

    public function showUsers () {

        $sql = "SELECT * FROM User";

        $resp = $this->db->query($sql);

        return json_encode($resp, JSON_UNESCAPED_LINE_TERMINATORS);
    }

    public function changeStatus ($orderNum, $orderStatus)
    {
//        UPDATE OrderProject SET status = 'no money' WHERE idOrder = 20
        $sql = 'UPDATE OrderProject SET status = :status WHERE idOrder = :id';

        $params = [
            'status' => $orderStatus,
            'id' => $orderNum
        ];

        $resp = $this->db->executePrepareSql($sql, $params);

        return $resp;
    }
}