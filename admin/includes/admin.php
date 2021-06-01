<?php

if (isset($_SESSION["admin"])) {
    $id = $_SESSION["id"];

    require_once "../includes/connect-db.php";
    require_once "../includes/functions.php";

}
