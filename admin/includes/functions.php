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

function createUser($id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role) {
    require_once "connect-db.php";
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

function updateUser($conn, $id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $courseId, $yearLevel, $role) {
    $sql = "UPDATE users SET email = '" . $email . "', password = '" . $password . "', first_name = '" . $firstName . "', middle_name = '" . $middleName . "', last_name = '" . $lastName . "', phone = '" . $phone . "', gender = '" . $gender . "', course_id = '" . $courseId . "', year_level = '" . $yearLevel . "', role = '" . $role . "' WHERE id = '" . $id . "'";
    mysqli_query($conn, $sql);
}
