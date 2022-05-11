<?php
include_once('database.php');
$id = $_GET['id'];
// sql to delete a record
$db->delete($id);
header("Location: http://localhost:8080/fg/miniCRUD/");