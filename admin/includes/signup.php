<?php
session_start();
if (isset($_SESSION["id"])) {
    if ($_SESSION["role"] === "admin") {
        if (isset($_POST["save-btn"])) {
            $_SESSION['add'] = 'add';
            addData();
            if ($_SESSION['mode'] === 'edit') {
                $_SESSION['edit'] = 'edit';
                editData();
                unset($_SESSION["mode"]);
            } else {

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

function editData() {
    if (isset($_POST['edit-btn'])) {
        require_once "connect-db.php";
        // require_once "includes/functions.php";
        $id = $_POST["id"];
        $sql = "SELECT * FROM user";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../registration.php?signup=stmtfail");
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

function cancelAction() {
    unset($_SESSION["mode"]);
    $_SESSION['cancel'] = 'cancel';
    header('location: ../index.php');
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
}
