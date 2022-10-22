<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $valid = true;
    if (isset($_POST["firstName"]) && empty($_POST["firstName"])){
        echo "First name is required<br>";
        $valid = false;
    }
    if(isset($_POST["lastName"]) && empty($_POST["lastName"])){
        echo "Last name is required<br>";
        $valid = false;
    }

    if(isset($_POST["email"] ) && empty($_POST["email"])){
        echo "Email is required<br>";
        $valid = false;
    }else{
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format<br>";
            echo $emailErr;
            $valid = false;
        }
    }
    if(!isset($_POST["terms"])){
        echo "You must accept the terms of conditions<br>";
        $valid = false;
    }
    if(!isset($_POST['attend'])) {
        echo "You must pick atleast one event<br>";
        $valid = false;
    }

    if ($valid){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"] ;
        $tshirt = $_POST["tshirt"];
        $events = $_POST["attend"];
        echo "First name: $firstName <br> 
            Last name: $lastName <br> 
            Email: $email <br> 
            T-Shirt size: $tshirt <br>
            Events: ";
        foreach ($events as $value){
            echo " $value";
        }
    }

}

?>

