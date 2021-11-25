<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Generate Quote</title>
            <style>
                h1 {
                    color:white;
                }
                p {
                    color:white;
                }
                body {
                    background-image: url('https://i.imgur.com/9oe5oH5.jpg')
                }
            </style>
                <!-- https://pixabay.com/sv/photos/ljus-gl%c3%b6dlampa-h%c3%a4ngande-belysning-1246043/ -->
        </head>
        <body>
        <h1> Random quote picker</h1>

    <?php
    if (isset($_POST["Generate"])) {
    $Quotes=file('Quotes.txt');
    echo "<p>{$Quotes[array_rand($Quotes)]}</p>";
    }

    ?>  
         <form method="POST">
           <input type="submit" name="Generate" value="Get a Quote">
<br>
        </form>

    </body>
</html>