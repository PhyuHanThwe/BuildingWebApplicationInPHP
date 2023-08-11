<?php
    if (isset($_POST['cancle'])){
        header("Location: index.php");
        return;
    }

    $salt = 'XyZzy12*_';
    // $md5 = hash('md5', 'XyZzy12*_php123');
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';

    $found = false;
    if (isset($_POST['who']) && isset($_POST['pass'])){
        if (strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1){
            $found = "User name and password are required.";
            header("Location: login.php?error=".$found);
        }
        else{
            $check = hash('md5', $salt . $_POST['pass']);
            if ($check == $stored_hash){
                header("Location: game.php?name=".urlencode($_POST['who']));
                
            }
            else{
                $found = "Incorrect password";
                header("Location: login.php?error=".$found);
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phyu Han Thwe</title>
    <?php 
    require_once "bootstrap.php"
    ?>
</head>
<body>
    <div class="container">
    <h1>Please Log In</h1>
    <p>
<?php
    if (isset($_GET['error'])){
        echo $_GET['error'];
    }
?>
    </p>
    <form method="POST">
        <label for="nam">User Name</label>
        <input type="text" name="who" id="nam"><br>
        <label for="">Password</label>
        <input type="password" name="pass" id=""><br>
        <input type="submit" value="Log In">
        <input type="submit" value="Cancle" name="cancle">
    </form>
    </div>
</body>
</html>