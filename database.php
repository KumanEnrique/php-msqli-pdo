<?php
class Database {
  private const DB_NAME = "proyecto";
  private const DB_SERVERNAME = "localhost";
  private const DB_USERNAME = "root";
  private const DB_PASSWORD = "";
  private $conn;

  public function __construct(){
    $this->conn = new mysqli(self::DB_SERVERNAME, self::DB_USERNAME, self::DB_PASSWORD, self::DB_NAME);
    $this->isConnect();
  }
  public function isConnect(){
   // Check connection
    if ($this->conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";
  }
  /* public function createTable(){
    // sql to create table
    $sql = "CREATE TABLE MyGuests (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      firstname VARCHAR(30) NOT NULL,
      lastname VARCHAR(30) NOT NULL,
      email VARCHAR(50),
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
      )";
  
    if ($conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    $this->conn->close();
  } */
  public function insert($name,$year,$average,$image,$section){
    $sql = "INSERT INTO estudiantes (id, nombre, edad, promedio, imagen, id_seccion, fecha) VALUES (null,'{$name}', '{$year}', '{$average}','{$image}', '{$section}', NOW())";

    if ($this->conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $this->conn->close();
  }
  public function select($template_html){
    $sql = "SELECT * FROM estudiantes";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        printf($template_html,
            $row['id'],
            $row['nombre'],
            $row['edad'],
            $row['promedio'],
            $row['imagen'],
            $row['id_seccion'],
            $row['fecha'],
            $row['id'],
            $row['id'],
        );
      }
    } else {
      echo "0 results";
    }
    $this->conn->close();
  }
  public function delete($id){
    // sql to delete a record
    $sql = "DELETE FROM estudiantes WHERE id=$id";

    if ($this->conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }

    $this->conn->close();
  }
  public function update($id, $name, $year, $average){
    $sql = "UPDATE estudiantes SET nombre='$name', edad='$year', promedio='$average' WHERE id=$id";
    if ($this->conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
    $this->conn->close();
  }
  public function closeDB(){
    $this->conn->close();
  }
  public function where($id){
    $sql = "SELECT * FROM estudiantes WHERE id = $id";
    $result = mysqli_query($this->conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        printf('
            <div class="container">
                <div class="row mt-3">
                    <div class="col-lg-6 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h3>update</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="name">NAME</label>
                                        <input type="text" name="name" id="name" class="form-control" value="%s">
                                    </div>
                                    <div class="mb-3">
                                        <label for="year">YEAR</label>
                                        <input type="text" name="year" id="year" class="form-control" value="%s">
                                    </div>
                                    <div class="mb-3">
                                        <label for="average">AVERAGE</label>
                                        <input type="text" name="average" id="average" class="form-control" value="%s">
                                    </div>
                                    <div class="mb-3">
                                        <input type="hidden" name="id" id="image" class="form-control" value="%s">
                                    </div>
                                    <button class="btn btn-info">SAVE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ',
        $row['nombre'],
        $row['edad'],
        $row['promedio'],
        $row['id']
      );
      return array($row['nombre'],$row['edad'],$row['promedio'],$row['id']);
    } else {
        echo "0 results";
    }
  }
}
$db = new Database();
