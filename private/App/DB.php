<?php
namespace Leonid\Studio\App;
use PDO;


class DB
{
    /*
     *     private $servername;
    private $db_name;
    private $username;
    private $pwd;

    public function __construct()
    {
        $this->servername = 'localhost';
        $this->db_name = 'blog';
        $this->username = 'root';
        $this->pwd = '';
    }

    private function DBConnect(){
//        "mysql:host=localhost;dbname=blog"
        $connection = new PDO("mysql:host=$this->servername;dbname=$this->db_name",
            $this->username, $this->pwd);
        return $connection;
    }

    // получение всех данных из таблицы, например,
    // SELECT * FROM имя_таблицы;
    public function selectAllFromTable($sql_str){
        $connect = $this->DBConnect();
        $statement = $connect->query($sql_str); //PDOStatement
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // выполнение подготовленного запроса
    // вставка данных, обновление данных
    public function executePrepareSql($sql, $params){
        $connect = $this->DBConnect();
        $statement = $connect->prepare($sql);
        return $statement->execute($params);
// execute Возвращает TRUE в случае успешного завершения
// или FALSE в случае возникновения ошибки.
    }


    public function fetchData($sql, $params){
        $connect = $this->DBConnect();
        $statement = $connect->prepare($sql);
        $statement->execute($params);
        return $statement->fetch(PDO::FETCH_ASSOC);
        // ['id'=>2, 'title'=>'Article title']
    }
    public function fetchAllData($sql, $params){
        $connect = $this->DBConnect();
        $statement = $connect->prepare($sql);
        $statement->execute($params);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        // [
        //   ['id'=>2, 'title'=>'Article title'],
        //   ['id'=>3, 'title'=>'Article title 3'],
        //   ['id'=>4, 'title'=>'Article title']
        //]
    }
     */


}