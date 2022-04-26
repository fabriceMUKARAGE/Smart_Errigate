<?php

class Database
{

   // private $dsn = "sqlsrv:Server=localhost;Database=test";    // Conect with SQLServer
    private $dsn = "mysql:host=localhost;dbname=errigate";   // Conect with MySQL
    private $username = "root";
    private $pass = "";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->pass);
            // echo "Succesfully Conected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function insert($user_id, $bed_name){
        $sql = "INSERT INTO beds (user_id,bed_name) VALUES (:user_id,:bed_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'bed_name' => $bed_name]);
        return true; 
    }

    public function read()
    {
        $data = array();
        $sql = "SELECT beds.id, beds.user_id, customers.username, customers.email, customers.farm, beds.bed_name FROM beds  INNER JOIN customers
        ON beds.user_id = customers.id ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }


    public function getBedBiId($id)
    { 
        $sql = "SELECT id, user_id, bed_name FROM beds WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function update($id, $user_id, $bed_name)
    {
        $sql = "UPDATE beds SET user_id= :user_id, bed_name= :bed_name WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'bed_name' => $bed_name, 'id' => $id]);
        return true;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM beds WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function totalRowCount()
    {
        $sql = "SELECT count(*)  FROM beds";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

}
$ob = new Database();
// print_r($ob->insert(6,"Bed1: tomato"));
// print_r($ob->insert(6,"Bed3: cocoyam"));
// print_r($ob->read());
// print_r($ob->getBedBiId(4));
// print_r($ob->update(3, 6 ,"bed 2: cassava"));
// print_r($ob->totalRowCount());
// print_r($ob->delete(2));