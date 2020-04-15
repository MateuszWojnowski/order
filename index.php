<?php
session_start();
?>

<!DOCTYPE html>

<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <title>zamówienie</title>
</head>

<body>
<div id="wrapper">
    <?php

    if (isset($_SESSION["breadPrice"]) && isset($_SESSION["loafPrice"]) && isset($_SESSION["biscuitPrice"])) {
        $breadPrice = $_SESSION["breadPrice"];
        $loafPrice = $_SESSION["loafPrice"];
        $biscuitPrice = $_SESSION["biscuitPrice"];
    } else {
        $breadPrice = 3.99;
        $loafPrice = 0.49;
        $biscuitPrice = 4.99;
    }

    echo '
    <form action="order.php" method="post">
        imię i nazwisko klienta:
        <input type="text" name="surname"/>
        </br> </br>
        ilość chlebów('.$breadPrice.'):
        <input type="text" name="breads"/>
        </br> </br>
        ilość bułek('.$loafPrice.'):
        <input type="text" name="loafs"/>
        </br> </br>
        ilość ciastek('.$biscuitPrice.'):
        <input type="text" name="biscuits"/>
        </br> </br>
        <input type="submit" value="podsumuj"/></br></br>
    </form>
    <a href="setting.php">ustawienia</a></br></br>
    <a href="printOrders.php">wyświetl zamówienia</a></br></br>
';
    
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['comm'])) {
        echo $_SESSION['comm'];
        unset($_SESSION['comm']);
    }

    ?>



</div>
</body>
</html>