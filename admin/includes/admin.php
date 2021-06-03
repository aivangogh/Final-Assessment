<?php

if (isset($_POST["delete-data"])) {
    require_once "connect-db.php";
    require_once "functions.php";

    $id = $_POST["delete-id"];

    deleteData($conn, $id);
}

function deleteData($conn, $id) {
    $sql = "DELETE FROM users WHERE users.id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?delete=stmtfail");
        exit();
    }
    var_dump($id);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../dashboard.php?delete=success");
}
