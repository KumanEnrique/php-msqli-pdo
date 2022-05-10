<?php
include_once('database.php');
include_once('inc/header.php');

$id = $_GET['id'];
$sql = "SELECT * FROM estudiantes WHERE id = $id";
$result = mysqli_query($conn, $sql);
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
} else {
    echo "0 results";
}
if(isset($_POST['name']) && isset($_POST['year']) && isset($_POST['average']) && isset($_POST['id'])){
    $name = $_POST['name'];
    $year = $_POST['year'];
    $average = $_POST['average'];
    $section = $_POST['id'];
    $sql = "UPDATE estudiantes SET nombre='$name', edad='$year', promedio='$average' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost:8080/fg/miniCRUD/");
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);