<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>keno</title>
            <meta charset="UTF-8">
        </head>
        <body>
            <form method="POST">
                Input 11 numbers (between 1-70) seperated by ONE spacebar.

            <input type="text" name="myNum" size="25">
<br>        <Input type="submit" name="submit" value="Draw">

            
            </form>
        </body>
    </html>

    <?php

//keno

//slumpa fram 20 tal mellan 1 och 20

//jämför de 20 slumpande talen med 11 inmatade tal och berätta hur många som är rätt.
if (isset($_POST['myNum'])){
    //Skapar en aray av de inmatade talen
    $myNum=explode(" ", $_POST['myNum']);

      //felkontroll
      $ok=true;
     if (count($myNum)!==11) {  //det är inte 11 tal i arrayen
        echo "Make sure you have 11 Numbers between 1-70";
        $ok=false;
    } else {
        for ($i=0; $i < 11; $i++) {  //Kolla att det är heltal mellan 1 och 70
            if(!is_int((int)$myNum[$i]) || $myNum[$i]>70 || 
            $myNum[$i]<1) {
                echo "Make sure you have 11 Numbers between 1-70";
                $ok=false;
                break;
            }
        }
    }
    //slumpa fram 20 tal mellan 1 och 70
    if($ok){
    $num=[];
    while (count($num)<20) { 
        $rnd=rand(1,70);
        $num[$rnd]=1;
}  
    //Sortera talen
    ksort($num, SORT_NUMERIC);

    //Skriv ut talen
    echo "The 20 random numbers are..<br>";
    foreach ($num as $key=>$value) {
        echo "$key ";
        }

        //sorterar de inamtade talen
        sort($myNum, SORT_NUMERIC);

        //skriver ut dom
        echo "<br> your numbers....<br>";
        $numRight=0;
        foreach($myNum as $value) {
            //kontrollera om ditt tal finns bland de slumpade
            if(array_key_exists($value, $num)) {
                echo "<b>$value</b> ";
                $numRight++;
            } else {
                echo "$value ";
            }
        }
        echo "<br> you got $numRight correct!";
        var_dump($myNum);
    }
}

