<?php

function idExists($conn, $id) {
    $sql = "SELECT * FROM user WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?sign=stmtfail");
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

function createUser($conn, $studentId, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role) {
    $sql = "INSERT INTO user (id, email, password, first_name, middle_name, last_name, phone, gender, course_id, year_level, role) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../registration.php?error=stmtfail");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssssssssss", $studentId, $email, $hashedPwd, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../registration.php?signup=success");
    exit();
}

function getCourse($conn, $sessionId) {
    $sql = "SELECT course.course_id, course.course_name, college.college_id, college.college_name
            FROM user, college RIGHT JOIN course ON college.college_id = course.college_id
            WHERE course.course_id = user.course_id AND user.id = ?";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../home.php?home=stmtfail");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $sessionId);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($conn, $username, $password) {
    $idExists = idExists($conn, $username);

    if ($idExists === false) {
        header("location: ../login.php?login=doesntexists");
        exit();
    }

    $pwdHashed = $idExists["password"];
    $checkedPwd = password_verify($password, $pwdHashed);

    if ($checkedPwd === false) {
        header("location: ../login.php?login=fail");
        exit();
    } else if ($checkedPwd === true) {
        if ($idExists["role"] === "student") {
            session_start();
            $_SESSION['id'] = $idExists["id"];
            $_SESSION['email'] = $idExists["email"];
            header("location: ../home.php");
            exit();
        } else {
            session_start();
            $_SESSION['id'] = $idExists["id"];
            $_SESSION['email'] = $idExists["email"];
            header("location: ../admin.html");
            exit();
        }
    }
}

function userData($conn, $sessionId) {
    return idExists($conn, $sessionId);
}
