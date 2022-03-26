<?php
  class Customer {
    // DB Stuff
    private $conn;
    private $table = 'customers';

    // Properties
    public $id;
    public $username;
    public $email;
    public $password;
    public $phone_number;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get users
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        username,
        email,
        phone_number
      FROM
        ' . $this->table . '
      ORDER BY
        id ASC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single customer
  public function read_single(){
    // Create query
    $query = 'SELECT
        id,
        username,
        email,
        phone_number
        FROM
          ' . $this->table . '
      WHERE id = ?
      LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->id = $row['id'];
      $this->username = $row['username'];
      $this->email = $row['email'];
      $this->phone_number = $row['phone_number'];
  }

  // Create Customer
  public function create() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      username = :username,
      email = :email,
      password = :password,
      phone_number = :phone_number';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->username = htmlspecialchars(strip_tags($this->username));
  $this->email = htmlspecialchars(strip_tags($this->email));
  $this->password = htmlspecialchars(strip_tags($this->password));
  $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));

  // Bind data
  $stmt-> bindParam(':username', $this->username);
  $stmt-> bindParam(':email', $this->email);
  $stmt-> bindParam(':password', $this->password);
  $stmt-> bindParam(':phone_number', $this->phone_number);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Update Category
  public function update() {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      username = :username,
      email = :email,
      phone_number = :phone_number
      WHERE
      id = :id';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->id = htmlspecialchars(strip_tags($this->id));
  $this->username = htmlspecialchars(strip_tags($this->username));
  $this->email = htmlspecialchars(strip_tags($this->email));
  $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));

  // Bind data
  $stmt-> bindParam(':id', $this->id);
  $stmt-> bindParam(':username', $this->username);
  $stmt-> bindParam(':email', $this->email);
  $stmt-> bindParam(':phone_number', $this->phone_number);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  // Delete Customer
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: $s.\n", $stmt->error);

    return false;
    }
   }
