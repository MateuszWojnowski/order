<?php
session_start();
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
    <title>zamówienie</title>
</head>

<body>
<div id="wrapper">

    <?php

    require_once "connectBase.php";

    $connect = @new mysqli($host, $dbUser, $dbPassword, $dbName);
    if ($connect->connect_errno != 0) {
        echo "Error: " . $connect->connect_errno;
    } else {
        $orders = @$connect->query("SELECT * FROM `orders` ");

        while ($result = $orders->fetch_assoc()) {
            echo "<p>Imię i nazwisko: " . $result["nameAndSurname"] . ", chleby: " . $result["breads"] . ", bułki: " . $result["loafs"] . ", ciastka: " . $result["biscuits"] . ", suma: " . $result["suma"] . "</p>";
        }


        echo "</br></br>";
        $connect->close();
    }
    echo '<a href="index.php">powrót</a>';

    ?>

</div>
</body>
</html>