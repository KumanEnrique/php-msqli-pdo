  <?php
  class Database {
    private const DB_NAME = "proyecto";
    private const DB_SERVERNAME = "localhost";
    private const DB_USERNAME = "root";
    private const DB_PASSWORD = "";
    private $conn;

    public function __construct(){
      try {
        $this->conn = new PDO(sprintf('mysql:host=%s;dbname=%s',self::DB_SERVERNAME,self::DB_NAME), self::DB_USERNAME, self::DB_PASSWORD);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
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
      try {
        $sql = "INSERT INTO estudiantes (id, nombre, edad, promedio, imagen, id_seccion, fecha) VALUES (null,'{$name}', '{$year}', '{$average}','{$image}', '{$section}', NOW())";
        // use exec() because no results are returned
        $this->conn->exec($sql);
        echo "New record created successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      $this->conn = null;
    }
    public function select($body_html){
      try {
        $query = $this->conn -> prepare("SELECT * FROM estudiantes");
        $query -> execute();
        // $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        // if($query -> rowCount() > 0){}
      
        foreach($results as $k=>$row) {
          // echo $row['id']." |°| ".$row['nombre']." |°| ".$row['edad']." |°| ".$row['promedio']." |°| ".$row['id_seccion']." |°| ";
          printf($body_html, $row['id'], $row['nombre'], $row['edad'], $row['promedio'], $row['imagen'], $row['id_seccion'], $row['fecha'], $row['id'], $row['id'] );
        }
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      $this->conn = null; 
    }
    public function delete($id){
      try {
        // sql to delete a record
        $sql = "DELETE FROM estudiantes WHERE id=$id";
        // use exec() because no results are returned
        $this->conn->exec($sql);
        echo "Record deleted successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      $this->conn = null;
    }
    public function update($id, $name, $year, $average){
      try {
        $sql = "UPDATE estudiantes SET nombre='$name', edad='$year', promedio='$average' WHERE id=$id";
         // Prepare statement
        $stmt = $this->conn->prepare($sql);

        // execute the query
        $stmt->execute();
        // echo a message to say the UPDATE succeeded
        echo " records UPDATED successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      $this->conn = null;
    }
    public function closeDB(){
      $this->conn = null;
    }
    public function where($id){
      try {
        $query = $this->conn -> prepare("SELECT * FROM estudiantes WHERE id = $id");
        $query -> execute();
        // $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $results = $query -> fetchAll(PDO::FETCH_ASSOC);
        // if($query -> rowCount() > 0){}
        $row = $results[0];
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
      } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      // $this->conn = null;
    }
  }
$db = new Database();
