<?php
namespace Leonid\Studio\App;
use PDO;


class DB
{
    private $servername;
    private $db_name;
    private $username;
    private $pwd;
    private $connect;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->db_name = 'Studio';
        $this->username = 'root';
        $this->pwd = '';
        $this->connect = $this->DBConnect();
    }

    private function DBConnect(){
        $connection = new PDO("mysql:host=$this->servername;dbname=$this->db_name",
            $this->username, $this->pwd);
        return $connection;
    }

//    добавление данных
    public function executePrepareSql($sql, $params){
        $statement = $this->connect->prepare($sql);
        return $statement->execute($params);
    }

//    получение данных
    public function fetchData($sql, $params){
        $statement = $this->connect->prepare($sql);
        $statement->execute($params);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}