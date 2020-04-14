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

    <form action="order.php" method="post">
        imię i nazwisko klienta:
        <input type="text" name="surname"/>
        </br> </br>
        ilość chlebów(3.99):
        <input type="text" name="breads"/>
        </br> </br>
        ilość bułek(0.49):
        <input type="text" name="loafs"/>
        </br> </br>
        ilość ciastek(4.99):
        <input type="text" name="biscuits"/>
        </br> </br>
        <input type="submit" value="podsumuj"/>
    </form>

    <?php
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        unset($_SESSION['error']);
    }
    ?>



</div>
</body>
</html>