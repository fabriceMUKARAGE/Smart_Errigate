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
        $sql = "SELECT id, user_id, bed_name, humidity, temperature, pH, nitrogen, phosphorous, potassium, water_used FROM beds WHERE user_id=:user_id";
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
        $sql = "SELECT id, user_id, tank_name, level, refill, rate FROM tanks WHERE user_id=:user_id";
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


    public function bedValve($id, $is_valve_open)
    {
        $sql = "UPDATE beds SET is_valve_open= :is_valve_open WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['is_valve_open' => $is_valve_open, 'id' => $id]);
        return true;
    }

    public function tankValve($id, $is_pump_open)
    {
        $sql = "UPDATE tanks SET is_pump_open= :is_pump_open WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['is_pump_open' => $is_pump_open, 'id' => $id]);
        return true;
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
// print_r($ob->bedValve(4, "Close"));
// print_r($ob->tankValve(2, "Close"));
// print_r($ob->totalWeatherRowCount(33));
// print_r($ob->totalBedsRowCount(33));
// print_r($ob->totalTanksRowCount(33));