<?php
session_start();
if (!isset($_SESSION["belepve"]) || $_SESSION ["belepve"] != true){
    header("location:belepes");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    
    <?php
    if($_SESSION["belepve"] !=true){
        echo "<h1>Bejelentkezés szükséges!</h1>";
    }else {
        echo"<p>
        <a href='belepes'>Belépés</a>
    </p>";
    }
    
    ?>
</body>
</html>
