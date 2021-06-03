<?php

function idExists($conn, $id) {
    $sql = "SELECT * FROM users WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?signup=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }

    mysqli_stmt_close($stmt);
}

function getUserData($conn, $id) {
    if (isset($_POST['edit-btn'])) {
        // require_once "includes/functions.php";;
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?sign=stmtfail");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            return false;
        }

        mysqli_stmt_close($stmt);
    }
}

function createUser($conn, $studentId, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role) {
    $sql = "INSERT INTO users (id, email, password, first_name, middle_name, last_name, phone, gender, course_id, year_level, role) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?sign=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssssssss", $id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function updateUser($conn, $id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role) {
    $sql = "UPDATE users SET (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../dashboard.php?sign=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssss", $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
