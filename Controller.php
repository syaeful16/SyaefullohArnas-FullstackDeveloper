<?php 

require_once 'Database.php';

class Controller extends Database {
  private $name, $gender, $age;
  private $data = [];
  private $countMale;

  public function insertData($name, $gender, $age) {
    $this->name = $name;
    $this->gender = $gender;
    $this->age = $age;

    $sql = "INSERT INTO friends VALUES ('', '".$this->name."', '".$this->gender."', '".$this->age."')";
    mysqli_query($this->conn, $sql);

    if (mysqli_affected_rows($this->conn) > 0) {
      $_SESSION["status"] = "success";
      $_SESSION["message"] = "Berhasil Input data";
    }

  }

  public function getAllData() {
    $query = "SELECT * FROM friends";
    $result = mysqli_query($this->conn, $query);

    while($row = mysqli_fetch_assoc($result)) {
      $this->data = $row;
    }

    return $this->data;
  }

  public function getTotalMale() {
    $sql = "SELECT gender FROM friends WHERE gender='Laki-laki'";
    $result = mysqli_query($this->conn, $sql);
    $total = mysqli_num_rows($result);

    return $total;
  }
}

?>