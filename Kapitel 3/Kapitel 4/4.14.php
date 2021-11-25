<?php
        $myFile = "citat.txt";
        $lines = file($myFile);
        var_dump($lines);

        foreach($lines as $line) 
{
    $var = explode(':', $line, 2);
    $arr[$var[0]] = $var[0];
}
    print_r($arr);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Citat</title>
        <meta charset="UTF-8">
    </head>
    
    <body>
        <form method="POST">
<br>
            <input type="submit" name="pickQuote" value="Quote">
        </form>
<?php
    
?>
    </body>

    </html>