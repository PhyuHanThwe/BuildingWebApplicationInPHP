<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phyu Han THwe</title>
</head>
<body>
    <h1>MD5 cracker</h1>
    <p>This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
    <pre>Debug output: 
<?php
    $target = $_GET["md5"];
    // $hashtarget = hash('md5', $target);
    // echo "target: ". $hashtarget . "\n\n\n\n";
    // echo "\t";
    
    $found = FALSE;
    $totalChecks = 1;
    $startTime = microtime(true);
    $pin = '';
    for ($i=0; $i<=9999; $i++){
        $stringI = (string)$i;
        $y = 4 - strlen($stringI);
        for ($x=0; $x<$y; $x++){
            $stringI = '0' . $stringI;
        }

        $debug_output = hash('md5', $stringI);
        if ($i < 15){
            echo ($debug_output . "\t" . $stringI ."\n");
        }

        if ($target == hash('md5', $stringI)){
            $totalChecks = $totalChecks + $i;
            $totalChecks = (string)$totalChecks;
            echo "Total Checks: " . $totalChecks ."\n";

            $endTime = microtime(true);
            $timeDiff = $endTime - $startTime;
            $timeDiff = (string)$timeDiff;
            echo "Ellapsed Time: " . $timeDiff  . "\n";

            $found = TRUE;
            $pin = $stringI;
            break;
        }
    }

?>
    </pre>
    <p>
<?php
    if ($found == TRUE){
        echo "PIN: " . $pin;
    }
    else{
        echo "\nPIN: Not found";
    }
?>
    </p>
    <form action="">
        <input type="text" name="md5" size="50" id="" value="<?= htmlentities($target)?>">
        <input type="submit">
    </form>
</body>
</html>