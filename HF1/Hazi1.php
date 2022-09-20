<?php
$nap = date("D");
switch ($nap){
    case "Mon":
        echo "HETFO";
        break;
    case "Tue":
        echo "KEDD";
        break;
    case "Wed":
        echo "Szerda";
        break;
    case "Thu":
        echo "CSUTORTOK";
        break;
    case "Fri":
        echo "PENTEK";
        break;
    case "Sat":
        echo "SZOMBAT";
        break;
    case "Sun":
        echo "VASARNAP";
        break;
}
echo "<br>";
//MASODIK
echo "MASODIK<br>";
echo <<< end
<form name="form" method="post">
    <input type=number name="first" id="first">
    <select name="operators" id="operators">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input type=number name="second" id="second">
    <input type="submit" value="Submit" ">
</form>
end;

if (isset($_POST['first'], $_POST['second'])){
    $first = $_POST['first'];
    $second= $_POST['second'];
    $operator = $_POST['operators'];
    switch($operator)
    {
        case "+":
            echo "Answer is: " .$first + $second;
            break;
        case "-":
            echo "Answer is: " .$first - $second;
            break;
        case "*":
            echo "Answer is: " .$first * $second;
            break;
        case "/":
            echo "Answer is: " .$first / $second;
            break;
    }
}


//HARMADIK
echo "<br>HARMADIK";
$maxcols = 10;
$maxrows = 10;
$row = 1;
$col = 1;
$startid = 1;

echo "<table border='1'>\n";
for ($i = 1;$i<=$maxrows;$i++) {

    echo "<tr>\n";
    for ($j=1;$j<=$maxcols;$j++){
        echo "  <td>$row/$col = " . round($row/$col, 2) . "</td>\n";
        $col++;
    }
    $row++;
    echo "</tr>\n<tr>\n";
    echo "</tr>\n";
    $col = 1;
}

echo "</table>\n";



//NEGYEDIK
echo "NEGYEDIK";
echo '<table width="270px" border="1" cellpadding="3">';
for($row=1;$row<=8;$row++)
{
    echo "<tr>";
    for($col=1;$col<=8;$col++)
    {
        $total=$row+$col;
        if($total%2==0)
        {
            echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
        }
        else
        {
            echo "<td height=30px width=30px bgcolor=#000000></td>";
        }
    }
    echo "</tr>";
}
echo "</table>";
//OTODIK
echo "OTODIK";
echo <<< end
<form name="form" method="post">
    <input type="text" name="text">
    <input type="submit" value="Spongecase!">
</form>
end;

if (isset($_POST['text'])){
    $text = $_POST['text'];
    for($i = 0; $i < strlen($text); $i++){
        if($i%2 == 0){
            echo strtoupper($text[$i]);
        }
        else echo $text[$i];
    }
}

