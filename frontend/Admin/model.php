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
            echo "Succesfully Conected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public function insert($username, $email, $password, $phone_number, $credit, $farm)
    {
        $sql = "INSERT INTO customers (username,email,password,phone_number,credit,farm) VALUES (:username,:email,:password,:phone_number,:credit,:farm)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password, 'phone_number' => $phone_number,'credit' => $credit,'farm' => $farm]);
        return true;
    }

    public function read()
    {
        $data = array();
        $sql = "SELECT id, username, email, phone_number, credit, farm FROM customers order by id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }


    public function getUserBiId($id)
    { 
        $sql = "SELECT id, username, email, phone_number, credit, farm FROM customers WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function update($id, $username, $email,$phone_number, $credit, $farm)
    {
        $sql = "UPDATE customers SET username= :username, email= :email, phone_number= :phone_number, credit= :credit, farm= :farm WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $email,'phone_number' => $phone_number,'credit' => $credit,'farm' => $farm,'id' => $id]);
        return true;
    }

    // public function addFarm($user_id, $farm_name){
    //     $sql = "INSERT INTO farm (user_id,farm_name) VALUES (:user_id,:farm_name)";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['user_id' => $user_id, 'farm_name' => $farm_name]);
    //     return true; 
    // }

    public function addSensor($user_id, $sensor_name,$location,$type){
        $sql = "INSERT INTO sensor (user_id,sensor_name,location,type) VALUES (:user_id,:sensor_name,:location,:type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'sensor_name' => $sensor_name, 'location' => $location, 'type' => $type]);
        return true; 
    }

    public function addBed($user_id, $bed_name){
        $sql = "INSERT INTO beds (user_id,bed_name) VALUES (:user_id,:bed_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'bed_name' => $bed_name]);
        return true; 
    }

    public function addTank($user_id, $tank_name){
        $sql = "INSERT INTO tanks (user_id,tank_name) VALUES (:user_id,:tank_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'tank_name' => $tank_name]);
        return true; 
    }

    public function delete($id)
    {
        $sql1 = "DELETE FROM customers WHERE id=:id";
        $sql2 = "DELETE FROM beds WHERE user_id=:id";
        $sql3 = "DELETE FROM sensor WHERE user_id=:id";
        $sql4 = "DELETE FROM tanks WHERE user_id=:id";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt2 = $this->conn->prepare($sql2);
        $stmt3 = $this->conn->prepare($sql3);
        $stmt4 = $this->conn->prepare($sql4);
        $stmt1->execute(['id' => $id]);
        $stmt2->execute(['id' => $id]);
        $stmt3->execute(['id' => $id]);
        $stmt4->execute(['id' => $id]);
        return true;
    }

    public function totalRowCount()
    {
        $sql = "SELECT count(*)  FROM customers";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

}
$ob = new Database();
// print_r($ob->insert("Esther","esthermensah@gmail.com","12345678","1234567890","0.00","dzi farms"));
// print_r($ob->insert("Joana","joanateye18@gmail.com","12345678","1234567890","0.00","Jo farms"));
// print_r($ob->read());
// print_r($ob->getUserBiId(6));
// print_r($ob->update(5, "Dzifa","esthermensah@gmail.com","1234567890","0.00","dzi farms"));
// print_r($ob->totalRowCount());
// print_r($ob->addSensor(5,"temp1","Bed1","temperature"));
// print_r($ob->addBed(5,"Bed1"));
// print_r($ob->addTank(5,"Tank1"));
// print_r($ob->delete(5));