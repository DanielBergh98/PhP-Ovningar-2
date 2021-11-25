<?php
declare(strict_types=1);
 
/** 
 * sparar undan en cookie med angivet namn
 * $param string namn
 * $return void
 */
function saveName(string $name):void {
    //sätter cookies 'namn' till värder på inparametern
    setcookie('name', $name);

    return;
}
function rollDices():int {
    $value= random_int(1,6);

    // Returnerar ett träningskaast med en vanlig tärning
    return $value;
}
//funktion för att avgöra vilka tärningar som ska slås om
//spara array_$post elementet dice_$=on betyder att tärningen ska slås om
//                   elementet t_$ har tärningens tidigare värde
//return array 5 heltal med tärningens värde
function rerollDice(array $post):array {
    $ret=[];
    //loopa igenom alla tärningar
    for ($i=0; $i <5 ; $i++) { 
        if(isset($post["dice_$i"])){
        //slå om tärningen
        $ret[$i]=rollDices();
    } else {
        //behåll tärnings värde och (gör om till heltal)
        $ret[$i]=(int) $post["t_$i"];
        }
    }   
   //returnera ny täringarnas värde
   return $ret;
}
function valueDice(array $dice): array {
    /* $tarning = $post;
    läs in tärningparams värden från formuläret till en array
    for ($i=0; $i < 5; $i++) { 
        $dice[$i]=(int) $_POST["t_$i"];
    }
    */
        //Switch för att namnge funktioners kalkulationer rad 73 nerråt
    switch (count (array_count_values($dice))) {
        case 1:
            return ["result" => "Yatzy!", "value"=>50];
        case 2:
            if (countQuadPair(array_count_values($dice))!==0) {
                return ["result" => "QuadPair", "value" =>countQuadPair(array_count_values($dice))];
            }   else {
                return ["result" => "Full House", "value" =>countFullHouse(array_count_values($dice))];
            }
        case 3:
            if (countThreePair(array_count_values($dice)) !== 0) {
                return ["result" => "ThreePair", "value" =>countThreePair(array_count_values($dice))];
            } else {
                return ["result" => "twoPair", "value" =>countTwoPair(array_count_values($dice))];
            }
        case 4:
                return ["result" => "pair", "value"=>countPair(array_count_values($dice))];

                default:
                $eyes = raknaOgon(array_count_values($dice));
                if ($eyes === 15) {
                      return ["result" => "Small", "value" => 15];
                } elseif ($eyes === 20) {
                    return ["result" => "Big", "value" => 20];
                } else {
                    return ["result" => "Chance", "value" => $eyes];
                }
            
                break;
    }
}

    //Funktioner för att räkna olika tärnings Kombinationer.
        function countPair(array $values):int {
            foreach ($values as $eyes => $ammount) {
            if ($ammount==2) {
                return 2*$eyes;
            }
        }
        return 0;
    }
        function countQuadPair($values):int {
            foreach ($values as $eyes => $ammount) {
                if ($ammount==4) {
                    return 4*$eyes;
                }
            }
        return 0;
}
        function countThreePair($values):int {
            foreach ($values as $eyes => $ammount) {
                if ($ammount==3) {
                    return 3*$eyes;
        }
    }
        return 0;
}

        function countTwoPair(array $values): int {
            $sum = 0;
            foreach ($values as $eyes=> $ammount) {
                if ($ammount !== 1) {
            $sum += $eyes * $ammount;
        }
    }

    return $sum;
}

        function countFullHouse(array $values):int {
            $sum = 0;
                foreach ($values as $eyes => $ammount) {
            $sum += $eyes*$ammount;
    }
    return $sum;
}
        function raknaOgon(array $values): int {
            $sum = 0;
                foreach ($values as $eyes => $ammount) {
            $sum += $eyes;
    }
    return $sum;
}