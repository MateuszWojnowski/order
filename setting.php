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

    echo '
    <form action="setting.php" method="post">
        cena za jeden chleb:
        <input type="text" name="breadPrice"/>
        </br> </br>
        cena za jedną bułkę:
        <input type="text" name="loafPrice"/>
        </br> </br>
        cena za jedno ciastko:
        <input type="text" name="biscuitPrice"/>
        </br> </br>
        <input type="submit" value="ustaw"/></br></br>
    </form>
    ';

    try {
        if (isset($_POST["breadPrice"]) && isset($_POST["loafPrice"]) && isset($_POST["biscuitPrice"])) {

            if (!is_numeric($_POST['breadPrice']) || !is_numeric($_POST['loafPrice']) || !is_numeric($_POST['biscuitPrice'])) {
                throw new Exception('uncorrect prices', 1);
            }
            if ($_POST['breadPrice'] == NULL || $_POST['breadPrice'] == "" ||
                $_POST['loafPrice'] == NULL || $_POST['loafPrice'] == "" ||
                $_POST['biscuitPrice'] == NULL || $_POST['biscuitPrice'] == "") {
                throw new Exception('uncorrect prices', 1);
            }

            $_SESSION["breadPrice"] = $_POST["breadPrice"];
            $_SESSION["loafPrice"] = $_POST["loafPrice"];
            $_SESSION["biscuitPrice"] = $_POST["biscuitPrice"];
            header("Location: index.php");
        }
    } catch (Exception $exception) {
        echo "Niepoprawne dane";
    }

    ?>



</div>
</body>
</html>