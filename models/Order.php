<?php


class Order
{
    // Properties

    public $id = null;
    public $name = null;
    public $price = null;
    public $count = null;

    public function __construct($data = array())
    {
        if (isset($data['id'])) $this->id = (int)$data['id'];
        if (isset($data['name'])) $this->name = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-Яіїa-zA-Z0-9()]/u", "", $data['name']);
        if (isset($data['price'])) $this->price = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-Яіїa-zA-Z0-9()]/u", "", $data['price']);
        if (isset($data['count'])) $this->count = preg_replace("/[^\.\,\-\_\'\"\@\?\!\:\$ а-яА-Яіїa-zA-Z0-9()]/u", "", $data['count']);
    }

    public function storeFormValues($params)
    {
        $this->__construct($params);
    }

    /**
     * @return Order|false, or false if the record was not found or there was a problem
     */

    public static function getById($id)
    {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT * FROM Orders WHERE id = :id";
        $st = $conn->prepare($sql);
        $st->bindValue(":id", $id, PDO::PARAM_INT);
        $st->execute();
        $row = $st->fetch();
        $conn = null;
        if ($row) return new Order($row);
    }

    public static function getList($numRows = 1000000)
    {
        $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM Orders " . " LIMIT :numRows";

        $st = $conn->prepare($sql);
        $st->bindValue(":numRows", $numRows, PDO::PARAM_INT);
        $st->execute();
        $list = array();

        while ($row = $st->fetch()) {
            $order = new Order($row);
            $list[] = $order;
        }

        $sql = "SELECT FOUND_ROWS() AS totalRows";
        $totalRows = $conn->query($sql)->fetch();
        $conn = null;
        return (array("results" => $list, "totalRows" => $totalRows[0]));
    }
}


