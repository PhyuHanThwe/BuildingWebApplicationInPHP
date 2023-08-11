<?php
    if (! isset($_GET['name'])){
        die("Name parameter missing");
    }

    if(isset($_POST['logout'])){
        header("Location: index.php");
        return;
    }

    $names = array("Rock", "Paper", "Scissors");
    $human = isset($_POST['human']) ? $_POST['human'] + 0: -1;
    $computer = rand(0,2);
    
    function check($computer, $human){
        $names = array("Rock", "Paper", "Scissors");
        $human = $names[$human];
        $computer = $names[$computer];  
        if ($human == $computer){
            return "Tie";
        }
        // else if ($human > $computer){
        //     return "You Win";
        // }
        else if ($human == "Rock" && $computer == "Scissors"){
            return "You Win";
        }
        else if ($human == "Paper" && $computer == "Rock"){
            return "You Win";
        }
        else if ($human == "Scissors" && $computer == "Paper"){
            return "You Win";
        }
        else{
            return "You Lose";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phyu Han Thwe</title>
    <?php require_once "bootstrap.php" ?>
</head>
<body>
    <div class="container">
    <h1>Rock Paper Scissors</h1>
<?php
    if(isset($_REQUEST['name'])){
        echo "<p>Welcome: ";
        echo htmlentities($_REQUEST['name']);
        echo "</p>";
    }
?>
    <form method="POST">
        <select name="human">
            <option value="-1">Select</option>
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
            <option value="3">Test</option>
        </select>
        <button type="submit">Play</button>
        <input type="submit" value="Log Out" name="logout">
        <!-- <button type="submit" name="logout">Log out</button> -->
    </form>
<pre>
<?php
    if($human == -1){
        echo "Please select a strategy and press Play.";
    }
    else if ($human == 3){
        for($c=0;$c<3;$c++) {
            for($h=0;$h<3;$h++) {
                $r = check($c, $h);
                print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
            }
        }
    }
    else{
        $result = check($computer, $human);
        print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
    }
?>
</pre>
    </div>
</body>
</html>