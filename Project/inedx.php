<?php
      
    $playerCards = "";
    $dealerCards = "";
  
      $cards = array("11" => 11,"H1" => 1,"H2" => 2,"H3" => 3,"H4" => 4,"H5" => 5,
                      "H6" => 6,"H7" => 7,"H8" => 8,"H9" => 9, "H10" => 10,
                      "11" => 11,"D1" => 1,"D2" => 2,"D3" => 3,"D4" => 4,"D5" => 5,
                      "D6" => 6,"D7" => 7,"D8" => 8,"D9" => 9,"D10" => 10,
                      "11" => 11,"S1" => 1,"S2" => 2,"S3" => 3,"S4" => 4,"S5" => 5,
                      "S6" => 6,"S7" => 7,"S8" => 8,"S9" => 9 ,"S10" => 10,
                      "11" => 11,"C1" => 1,"C2" => 2,"C3" => 3,"C4" => 4,"C5" => 5,
                      "C6" => 6,"C7" => 7,"C8" => 8,"C9" => 9,"C10" => 10,);
          $rand_keys = array_rand($cards,2);

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
    <meta charset="UTF-8">
    <title>Project</title>
    </head>
    <body>
        <form method="POST">
            <input type="submit" name="drawCards" value="Draw">
        </form> 
    

    <?php
        
        if (isset($_POST['drawCards'])) {
            for ($i=0; $i < 1 ; $i++) {
                $card = implode(',',$cards); 
                $cardValueP =  $cards[$rand_keys[0]] + $cards[$rand_keys[1]];
            } if ($cardValueP == 21) {
                echo "Black Jack!";
            } elseif ($cardValueP != 21) {
                echo "You have $cardValueP";
            }
    }
        if (isset($_POST['drawCards'])) { 
            ?>
            <form method="POST">
            <input type="submit" name="drawNewCard" value="Hit">
        </form> 

    <?php  } 
        
        if (isset($_POST["drawNewCard"])) {
            for ($i=0; $i < 1 ; $i++) {
                $card = implode(',',$cards); 
                $cardValue2P = $cardValueP + $cards[$rand_keys[0]];
                echo $cardValue2P;
            }
        }
    ?>
   

    </body>

</html>