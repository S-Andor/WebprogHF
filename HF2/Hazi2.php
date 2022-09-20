<?php
//ELSO
 $firstArray = array(5, '5', '05', 12.3, '16.7', 'five', 0xDECAFBAD, '10e200');
 foreach ($firstArray as $arrayItem){
     echo gettype($arrayItem);
     echo is_numeric($arrayItem) ? " Yes" : " No";
     echo "<br>";
 }
//Masodik
echo "<br>";
$orszagok = array( " Magyarország "=>" Budapest", " Románia"=>" Bukarest",
    "Belgium"=> "Brussels", "Austria" => "Vienna", "Poland"=>"Warsaw");
foreach ($orszagok as $orszag => $fovaros){
    echo "$orszag fővárosa $fovaros <br>";
}
//Harmadik
echo "<br>";
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);

foreach ($napok as $lang => $days){
    echo "$lang: ";
    foreach ($days as $day){
        echo " $day, ";
    }
    echo "<br>";
}
//Negyedik
echo "<br>";

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

function atalakit(array &$tomb, string $meret){
    if ($meret === "nagybetus"){
        $tomb = array_map('strtoupper', $tomb);
    }
    elseif ($meret === "kisbetus"){
        $tomb = array_map('strtolower', $tomb);
    }
}
atalakit($szinek,"nagybetus");
print_r($szinek);

echo "<br>";

atalakit($szinek,"kisbetus");
print_r($szinek);


//Otodik