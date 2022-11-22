<?php
include 'connect.php';
session_start();

echo 'login';

if (isset($_SESSION['user'])){

    $query = $mysqli->stmt_init();
    $query = $mysqli->prepare("SELECT * FROM users WHERE id = (?)");
    $query->bind_param('d',$_SESSION['user']);
    $query->execute();

    $results = $query->get_result();
    $result_array = $results->fetch_array();
    if ($result_array != null){
        header("Location: index.php");
        exit();
    }
    else{
        $_SESSION = array();
    }
}

if (isset($_POST['submit'])){
    if (isset($_POST['password']) && isset($_POST['username'])){
        $query = $mysqli->stmt_init();
        $query = $mysqli->prepare("SELECT * FROM users WHERE name = (?) AND password = (?)");
        $query->bind_param('ss',$_POST['username'],$_POST['password']);
        $query->execute();
        // $query->store_result();
        $results = $query->get_result();
        $result_array = $results->fetch_array();

        if ($result_array != null){
            $_SESSION['user'] = $result_array['id'];
            header("Location: index.php");
        }
        else{
            echo 'Hibas felhasznalo nev vagy jelszo';
            header("Location: login.php");
        }
    }
}
?>
<form name="form1" method="post" action="login.php">
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><input type="submit" value="SignIn" name="submit"></td>
        </tr>
    </table>
</form>

