<?php


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    require_once "db.inc.php";
    require "functions.inc.php";
    require "error-handling.inc.php";

    if (emptyInputLogin($username, $password) === true) {
        header("location: ../login.php?login=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
} else {
    header("location: ../login.php");
    exit();
}
