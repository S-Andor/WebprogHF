<?php
require 'connect.php';

session_start();
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
}

if (isset($_POST['submit'])){

    $name = $_POST['name'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $query = $mysqli->stmt_init();
    $query = $mysqli->prepare("INSERT INTO hallgatok (nev, szak , atlag) VALUES((?),(?),(?))");
    $query->bind_param('ssd',$name,$szak,$atlag);


    if ($query->execute()){
        echo "Minden jo";
        header("Location: index.php");
    }
    else{
        echo "SEmmi se jo";
    }
}
?>
<form name="form1" method="post" action="bevitel.php">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" required></td>
        </tr>
        <tr>
            <td>Szak</td>
            <td><input type="text" name="szak" required></td>
        </tr>
        <tr>
            <td>Atlag</td>
            <td><input type="text" name="atlag" required></td>
        </tr>
        <tr>
            <td><input type="submit" value="Save" name="submit"></td>
        </tr>
    </table>
</form>
