<?php
    declare (strict_types=1);
    require_once 'Function.php';
    $step = 0;
    $name="";
    //Kolla om namnet finns sparat.
    if(isset($_COOKIE['name'])) {
        $name=$_COOKIE['name'];
    }
    if (isset($_POST['submit'])) {
        switch ($_POST['submit']) {
            case 'Start Game!':
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
            saveName($name);
            case 'Play Again':
            for ($i=0; $i < 5 ; $i++) { 
                    $dice[$i]= rollDices();
            }
            $rerolls=1;
            $step = 1;
            break;
        case 'Next roll':
            if($_POST['rerolls']<2) {
                $rerolls=$_POST['rerolls'];
                $rerolls++;
            $dice=rerollDice($_POST);
            $step=1;
            }else{
                $dice=rerollDice($_POST);
                $result=valueDice($dice);
                $step=2;
            }

            break;
            case 'Quit':
                header("Location: https://skatt.fi");
                exit;

            default;
                break;
                
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Yatzy</title>
        <link href="css/Yatzy.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>Yatzy</h1>
        <?php
        include "html/Step$step.html";
        ?>
    </body>
</html>