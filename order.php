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

        $breads = (int) $_POST["breads"];
        $loafs = (int) $_POST["loafs"];
        $biscuits = (int) $_POST["biscuits"];
        $suma = $breads * 3.99 + $loafs * 0.49 + $biscuits * 4.99;
        $surname = $_POST["surname"];

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

        echo "Rachunek na: $surname</br></br>";
        echo "ilość chlebów: $breads</br>";
        echo "ilość bułek: $loafs</br>";
        echo "ilość ciastek $biscuits</br></br>";
        echo "SUMA: $suma</br></br>";
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