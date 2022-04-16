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


    public function insert($user_id, $sensor_name,$location,$type){
        $sql = "INSERT INTO sensors (user_id,sensor_name,location,type) VALUES (:user_id,:sensor_name,:location,:type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'sensor_name' => $sensor_name, 'location' => $location, 'type' => $type]);
        return true; 
    }

    public function read()
    {
        $data = array();
        $sql = "SELECT sensors.id, sensors.user_id, customers.email, customers.farm, sensors.sensor_name, sensors.location, sensors.type FROM sensors  INNER JOIN customers
        ON sensors.user_id = customers.id ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }


    public function getSensorBiId($id)
    { 
        $sql = "SELECT id, user_id, sensor_name, location, type FROM sensors WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function update($id, $user_id, $sensor_name, $location, $type)
    {
        $sql = "UPDATE sensors SET user_id= :user_id, sensor_name= :sensor_name, location= :location, type= :type WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id, 'sensor_name' => $sensor_name,'location' => $location, 'type' => $type, 'id' => $id]);
        return true;
    }


    public function delete($id)
    {
        $sql = "DELETE FROM sensors WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function totalRowCount()
    {
        $sql = "SELECT count(*)  FROM sensors";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

}
$ob = new Database();
// print_r($ob->insert(9,"hii"));
// print_r($ob->insert(6,"temp1","bed1","temperature"));
//  print_r($ob->read());
// print_r($ob->getSensorBiId(1));
// print_r($ob->update(1, 6,"temp1","bed 1","temperature"));
// print_r($ob->totalRowCount());
// print_r($ob->addSensor(5,"temp1","tank1","temperature"));
// print_r($ob->addtank(5,"tank1"));
// print_r($ob->addTank(5,"Tank1"));
// print_r($ob->delete(20));