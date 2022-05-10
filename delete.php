<?php
include_once('database.php');
$id = $_GET['id'];
// sql to delete a record
$sql = "DELETE FROM estudiantes WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    mysqli_close($conn);
    header("Location: http://localhost:8080/fg/miniCRUD/");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}