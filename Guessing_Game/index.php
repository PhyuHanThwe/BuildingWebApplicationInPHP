<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phyu Han Thwe</title>
</head>
<body>
    <h1>Welcome to my guessing game</h1>
    <p>
        <?php
            $correctNumber = rand(10,100);
            if (! isset($_GET['guess'])) {
                echo ("Missing guess parameter");
            }
            else if ( ! is_numeric($_GET['guess']) ) {
                echo("Your guess is not a number");
            } 
            else if ( strlen($_GET['guess']) < 1 ) {
            echo("Your guess is too short");
            }
            elseif ($_GET['guess'] < $correctNumber){
                echo ("Your guess is too low");
            }
            elseif ($_GET['guess'] > $correctNumber){
                echo ("Your guess is too high");
            }
            else{
                echo ("Congratulations - You are right");
            }
        ?>
    </p>
</body>
</html>