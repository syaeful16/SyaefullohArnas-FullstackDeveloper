<?php 

require_once 'Database.php';

class Controller extends Database {
  private $name, $gender, $age;
  // public $data = [];
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
    $result = mysqli_query($this->conn, "SELECT * FROM friends");
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
  }

  public function getTotalData() {
    $result = mysqli_query($this->conn, "SELECT * FROM friends");
    return mysqli_num_rows($result);
  }

  public function getTotalMale() {
    $sql = "SELECT gender FROM friends WHERE gender='Laki-laki'";
    $result = mysqli_query($this->conn, $sql);
    $total = mysqli_num_rows($result);

    return $total;
  }

  public function getTotalFemale() {
    $sql = "SELECT gender FROM friends WHERE gender='Perempuan'";
    $result = mysqli_query($this->conn, $sql);
    $total = mysqli_num_rows($result);

    return $total;
  }

  public function getMaleUnder19() {
    $sql = "SELECT * FROM friends WHERE age<=19 && gender='Laki-laki'";
    $result = mysqli_query($this->conn, $sql);
    $total = mysqli_num_rows($result);
    
    return $total;
  }
  
  public function getMaleAbove19() {
    $sql = "SELECT * FROM friends WHERE age>=20 && gender='Laki-laki'";
    $result = mysqli_query($this->conn, $sql);
    $total = mysqli_num_rows($result);
    
    return $total;
  }

  public function getFemaleUnder19() {
    $sql = "SELECT * FROM friends WHERE age<=19 && gender='Perempuan'";
    $result = mysqli_query($this->conn, $sql);
    $total = mysqli_num_rows($result);
    
    return $total;
  }
  
  public function getFemaleAbove19() {
    $sql = "SELECT * FROM friends WHERE age>=20 && gender='Perempuan'";
    $result = mysqli_query($this->conn, $sql);
    $total = mysqli_num_rows($result);
    
    return $total;
  }

  public function getPercentace($func, $total) {
    $result = ($func / $total) * 100;
    return $result; 
  }

}

?>