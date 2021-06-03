<?php
session_start();
if (isset($_SESSION["id"])) {
    if ($_SESSION["role"] === "admin") {
        if (isset($_POST["save-btn"])) {

            if ($_SESSION['mode'] === 'edit') {
                $_SESSION['edit'] = 'edit';
                updateData();
                unset($_SESSION["mode"]);
            } else {
                $_SESSION['add'] = 'add';
                addData();
                unset($_SESSION["mode"]);
            }
        }

        if (isset($_POST["cancel-btn"])) {
            cancelAction();
        }
    } else {
        header("location: ../home.php");
    }
} else {
    header("location: ../index.php");
}

function updateData() {
    if (isset($_POST['edit-btn'])) {
        require_once "connect-db.php";
        // require_once "includes/functions.php";
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

        updateUser($conn, $id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role);
    }
}

function cancelAction() {
    unset($_SESSION["mode"]);
    $_SESSION['cancel'] = 'cancel';
    header('location: ../dashboard.php');
}

function addData() {
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
        header("location: ../signup.php?signup=idtaken");
        exit();
    }

    if (emptyInputSignup($id, $firstName, $middleName, $lastName, $password) === true) {
        header("location: ../signup.php?signup=emptyinput");
        exit();
    }

    if ((nameValidation($firstName) || nameValidation($middleName) || nameValidation($lastName)) === true) {
        header("location: ../signup.php?signup=invalidinput");
    }

    if (emailValidation($email) === true) {
        header("location: ../signup.php?signup=invalidemail");
    }
    session_start();
    $_SESSION['demo'] = 'success';
    createUser($conn, $id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role);
    header("location: ../dashboard.php?add=success");
}
