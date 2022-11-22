<?php
require 'connect.php';
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries["id"];

session_start();
if (!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();
}

if (isset($_POST["submit"])){
    $name = $_POST['name'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];
    $id = $_POST['id'];

    $query = $mysqli->stmt_init();
    $query = $mysqli->prepare("UPDATE hallgatok SET nev=(?), szak=(?), atlag=(?) WHERE id=(?)");
    $query->bind_param('ssdd',$name,$szak,$atlag,$id);

    if ($query->execute()){
        echo "Minedn jo";header('Location: index.php');
    }
    else{
        echo "Semmi se jo";
    }
}else{

    $query = $mysqli->stmt_init();
    $query = $mysqli->prepare("SELECT * FROM hallgatok WHERE id=(?)");
    $query->bind_param('d',$id);

    $query->execute();
    $row = $query->get_result()->fetch_array();
}

?>
<form name="form1" method="post" action="update.php">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value='<?php echo $row["nev"];?>' required></td>
        </tr>
        <tr>
            <td>Szak</td>
            <td><input type="text" name="szak" value='<?php echo $row["szak"];?>' required></td>
        </tr>
        <tr>
            <td>Atlag</td>
            <td><input type="text" name="atlag" value='<?php echo $row["atlag"];?>' required></td>
            <td><input type="hidden" name="id" value='<?php echo $row["id"];?>' required></td>
        </tr>
        <tr>
            <td><input type="submit" value="Save" name="submit"></td>
        </tr>
    </table>
</form>
