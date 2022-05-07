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

    public function readBeds($user_id)
    {
        $data = array();
        $sql = "SELECT id, user_id, bed_name, humidity, temperature, pH, nitrogen, phosphorous, potassium, water_used, is_valve_open FROM beds WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function readFeaturedBeds($user_id)
    {
        $data = array();
        $sql = "SELECT id, bed_name, humidity, temperature, pH, nitrogen, phosphorous, potassium, water_used  FROM beds WHERE user_id=:user_id LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function readTanks($user_id)
    {
        $data = array();
        $sql = "SELECT id, user_id, tank_name, level, refill, rate, is_pump_open FROM tanks WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function readFeaturedTanks($user_id)
    {
        $data = array();
        $sql = "SELECT id, tank_name, level, refill, rate FROM tanks WHERE user_id=:user_id LIMIT 3";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function readSensors($user_id)
    {
        $data = array();
        $sql = "SELECT id, sensor_name, location, type, value_recorded FROM sensor WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function readFarmWeather($user_id)
    {
        $sql = "SELECT id, temperature, humidity, wind_speed, wind_direction, rainfall, solar_radiation FROM farm_weather WHERE user_id=:user_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    // public function getUserBiId($id)
    // { 
    //     $sql = "SELECT id, username, email, phone_number, credit, farm FROM customers WHERE id=:id";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->execute(['id' => $id]);
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     return $result;
    // }


    public function bedValve($id)
    {    

        $sql1 = "SELECT is_valve_open FROM beds WHERE id=:id";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->execute(['id' => $id]);
        $result = $stmt1->fetch(PDO::FETCH_ASSOC);
        // return $result;


        if ($result['is_valve_open']  == "opened"){
            $sql = "UPDATE beds SET is_valve_open='closed' WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
    
        }
        elseif($result['is_valve_open'] == "closed") {
            $sql = "UPDATE beds SET is_valve_open='opened' WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();    
        }

        else{
            echo "Unsuccessful";
        }
        return $result;
    }

    public function tankValve($id)
    {
        $sql1 = "SELECT is_pump_open FROM tanks WHERE id=:id";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->execute(['id' => $id]);
        $result = $stmt1->fetch(PDO::FETCH_ASSOC);
        // return $result;


        if ($result['is_pump_open']  == "opened"){
            $sql = "UPDATE tanks SET is_pump_open='closed' WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
    
        }
        elseif($result['is_pump_open'] == "closed") {
            $sql = "UPDATE tanks SET is_pump_open='opened' WHERE id = $id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();    
        }

        else{
            echo "Unsuccessful";
        }
        return $result;
    }


    public function totalRowCount($user_id)
    {
        $sql = "SELECT count(*)  FROM sensor WHERE user_id=:user_id";
        $result = $this->conn->prepare($sql);
        $result->execute(['user_id' => $user_id]);
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

    public function totalBedsRowCount($user_id)
    {
        $sql = "SELECT count(*)  FROM beds WHERE user_id=:user_id";
        $result = $this->conn->prepare($sql);
        $result->execute(['user_id' => $user_id]);
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

    public function totalTanksRowCount($user_id)
    {
        $sql = "SELECT count(*)  FROM tanks WHERE user_id=:user_id";
        $result = $this->conn->prepare($sql);
        $result->execute(['user_id' => $user_id]);
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

    public function totalWeatherRowCount($user_id)
    {
        $sql = "SELECT count(*)  FROM farm_weather WHERE user_id=:user_id";
        $result = $this->conn->prepare($sql);
        $result->execute(['user_id' => $user_id]);
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

}
$ob = new Database();
// print_r($ob->readBeds(33));
// print_r($ob->readFeaturedBeds(33));
// print_r($ob->readTanks(33));
// print_r($ob->readFeaturedTanks(33));
// print_r($ob->readSensors(33));
// print_r($ob->readFarmWeather(33));
// print_r($ob->getUserBiId(6));
// print_r($ob->bedValve(11));
// print_r($ob->tankValve(8));
// print_r($ob->totalWeatherRowCount(33));
// print_r($ob->totalBedsRowCount(33));
// print_r($ob->totalTanksRowCount(33));