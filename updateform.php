<?php
include_once('database.php');
include_once('inc/header.php');

$id = $_GET['id'];
$db->where($id);
if(isset($_POST['name']) && isset($_POST['year']) && isset($_POST['average']) ){
    $name = $_POST['name'];
    $year = $_POST['year'];
    $average = $_POST['average'];
    $id = $_POST['id'];
    
    $db->update($id, $name , $year, $average);
    header("Location: http://localhost:8080/fg/miniCRUD/");
}