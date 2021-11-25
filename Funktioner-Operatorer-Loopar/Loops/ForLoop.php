<?php

$sidor=$_GET['sidor'] ?? 2;
switch ($sidor) {
    case 4:
    case 6:
    case 8:
    case 12:
    case 20:
        $text="sidior-sidig tärning";
        break;
    default:
        $text="Falsk tärning!<br>
    $sidor-siding tärning finns inte!<br><br>";
}

echo $text;

for($i=1;$i<5;$i++) {
    echo "Tärning $i visar:" . rand(1,6) . "<br>";
}



