<?php

if (isset($_POST["register"])) {

    $studentId = $_POST["student-id"];
    $email = $_POST["university-email"];
    $password = $_POST["password"];
    $firstName = $_POST["first-name"];
    $middleName = $_POST["middle-name"];
    $lastName = $_POST["last-name"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];
    $yearLevel = $_POST["year-level"];

    require_once "db.inc.php";
    require_once "functions.inc.php";
    require_once "error-handling.inc.php";

    if (idExists($conn, $studentId, $email) === true) {
        header("location: ../registration.php?signup=idtaken");
        exit();
    }

    if(emptyInputSignup($studentId, $firstName, $middleName, $lastName, $email, $phone, $password) === true) {
        header("location: ../registration.php?signup=emptyinput");
        exit();
    }

    if((nameValidation($firstName) || nameValidation($middleName) || nameValidation($lastName)) === true) {
        header("location: ../registration.php?signup=invalidinput");
    }

    if (emailValidation($email) === true) {
        header("location: ../registration.php?signup=invalidemail");
    }

    createUser($conn, $studentId, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel);
} else {
    header("location: ../registration.php?signup=none");
    exit();
}
