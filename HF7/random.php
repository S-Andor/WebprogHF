<?php
session_start();

if (!isset($_SESSION['random'])){
    $szam = rand(1, 10);
    $_SESSION['random']= $szam;
}

if(isset($_POST["talalgatas"])) {

    $enSzam = $_POST['talalgatas'];
    $szam = $_SESSION['random'];
    if ($szam == $enSzam) {
        echo "Talal - uj szam generalodott";
        $szam = rand(1, 10);
        $_SESSION['random']= $szam;
    } else if ($szam < $enSzam) {
        echo "Kisebbet";
    } else {
        echo "Nagyobbat";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="POST" action="random.php">
  <input type="hidden" name="elkuldott" value="">
    Melyik számra gondoltam 1 és 10 között?
  <input name="talalgatas" type="text">
  <br>
  <br>
  <input type="submit" value="Elküld">
</form>

</body>
</html>