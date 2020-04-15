<?php
session_start();

if (!isset($_SESSION["breads"]) || !isset($_SESSION["loafs"]) || !isset($_SESSION["biscuits"]) || !isset($_SESSION["surname"]) || !isset($_SESSION['suma'])) {
    header("Location: index.php");
} else {
    $surname = $_SESSION["surname"];
    $breads = $_SESSION["breads"];
    $loafs = $_SESSION["loafs"];
    $biscuits = $_SESSION["biscuits"];
    $suma = $_SESSION["suma"];

    require_once "connectBase.php";
    $connect = @new mysqli($host, $dbUser, $dbPassword, $dbName);
    if ($connect->connect_errno != 0) {
        echo "Error: " . $connect->connect_errno;
    } else {
        @$connect->query("INSERT INTO orders SET nameAndSurname='$surname', breads='$breads', loafs='$loafs', biscuits='$biscuits', suma='$suma'");
        $connect->close();
        $_SESSION['comm'] = "Zapisano";
        header("Location: index.php");
    }
}
?>