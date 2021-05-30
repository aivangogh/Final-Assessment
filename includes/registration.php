<?php

if (isset($_POST["register"])) {

    $id = $_POST["id"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstName = $_POST["first-name"];
    $middleName = $_POST["middle-name"];
    $lastName = $_POST["last-name"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $yearLevel = $_POST["year-level"];
    $role = $_POST["role"];

    require_once "connect-db.php";
    require_once "functions.php";
    require_once "error-handling.php";

    if (idExists($conn, $id) !== false) {
        header("location: ../registration.php?signup=idtaken");
        exit();
    }

    if (emptyInputSignup($id, $firstName, $middleName, $lastName, $password) === true) {
        header("location: ../registration.php?signup=emptyinput");
        exit();
    }

    if ((nameValidation($firstName) || nameValidation($middleName) || nameValidation($lastName)) === true) {
        header("location: ../registration.php?signup=invalidinput");
    }

    if (emailValidation($email) === true) {
        header("location: ../registration.php?signup=invalidemail");
    }

    createUser($conn, $id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role);
} else {
    header("location: ../registration.php?signup=none");
    exit();
}
