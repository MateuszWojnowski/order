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

        if (!isset($_POST["breads"]) || !isset($_POST["loafs"]) || !isset($_POST["biscuits"]) || !isset($_POST["surname"])) {
            header("Location: index.php");
        }

        $_SESSION['breads'] = (int) $_POST["breads"];
        $breads = $_SESSION['breads'];
        $_SESSION['loafs'] = (int) $_POST["loafs"];
        $loafs = $_SESSION['loafs'];
        $_SESSION['biscuits'] = (int) $_POST["biscuits"];
        $biscuits = $_SESSION['biscuits'];
        if (isset($_SESSION["breadPrice"]) && isset($_SESSION["loafPrice"]) && isset($_SESSION["biscuitPrice"])) {
            $_SESSION['suma'] = $breads * $_SESSION["breadPrice"] + $loafs * $_SESSION["loafPrice"] + $biscuits * $_SESSION["biscuitPrice"];
        } else {
            $_SESSION['suma'] = $breads * 3.99 + $loafs * 0.49 + $biscuits * 4.99;
        }
        $_SESSION['surname'] = $_POST["surname"];
        $surname = $_SESSION['surname'];
        $surname = htmlentities($surname, ENT_QUOTES, "UTF-8");

        try {
            if (!surnameIsCorrect($surname)) {
                throw new Exception('uncorrect name or surname', 1);
            }

            if ($breads == 0 && $loafs == 0 && $biscuits == 0) {
                $_SESSION['error'] = '<p style="color:red"> Proszę wybrać conajmniej jeden artykuł </p>';
                throw new Exception('empty spaces', 2);
            }
        } catch (Exception $exception) {
            header("Location: index.php");
        }

        echo "Rachunek na: ".$_SESSION['surname']."</br></br>";
        echo "ilość chlebów: ".$_SESSION['breads']."</br>";
        echo "ilość bułek: ".$_SESSION['loafs']."</br>";
        echo "ilość ciastek ".$_SESSION['biscuits']."</br></br>";
        echo "SUMA: ".$_SESSION['suma']."</br></br>";
        echo '<a href="save.php">Zapisz do bazy</a></br></br>';
        echo '<a href="index.php">powrót</a>';





    function surnameIsCorrect ($surname) {
        for ($i = 0; $i<10; $i++) {
            if (strstr($surname, "$i") != false) {
                $_SESSION['error'] = '<p style="color:red"> Niepoprawne imię lub nazwisko (cyfra) </p>';
                return false;
            }
        }
        if ($surname == "") {
            $_SESSION['error'] = '<p style="color:red"> Proszę podać imię i nazwisko </p>';
            return false;
        }
        if (!strstr($surname, " ")) {
            $_SESSION['error'] = '<p style="color:red"> Proszę podać imię i nazwisko (podano jeden wyraz)</p>';
            return false;
        }
        return true;
    }

    ?>

</div>
</body>
</html>