<?php
$tarning=$i=0;
do {
    $tarning=rand(1,6);
    $i++;
} while ($tarning!=6);

echo "Du behövde $i slag för att få en 6:a";