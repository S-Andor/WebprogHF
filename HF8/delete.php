<?php
require 'connect.php';

session_start();
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries["id"];

$query = $mysqli->stmt_init();
$query = $mysqli->prepare("DELETE FROM hallgatok WHERE id=(?)");
$query->bind_param('d',$id);

if($query->execute()){
    header("Location: index.php");
}else{
    echo "ERROR";
}