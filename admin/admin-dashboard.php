<?php
session_start();

if (isset($_SESSION["id"]) && isset($_SESSION["role"])) {
    if ($_SESSION["role"] === "admin") {
        require_once "../includes/connect-db.php";
        require_once "includes/functions.php";

        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn, $sql);
    } else {
        header("location: ../home.php");
    }
} else {
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/Logo_of_Bukidnon_State_University.png">
    <link rel="stylesheet" href="css/admin-dashboard.css">
    <link rel="stylesheet" href="../css/util.css">
    <title>Registration | BUKSU E-learn</title>
</head>

<body>
    <div class="container">
        <div class="left-column">
            <div class="header">
                <img src="../assets/images/Logo_of_Bukidnon_State_University.png" alt="buksu-logo">
                <span>Admin Dashboard</span>
            </div>
            <button onclick="location.href='../includes/logout.php';" class="logout-btn" type="button">Logout</button>
        </div>

        <div class="right-column">
            <div class="query-container">
                <div class="query-response-container">
                    <p class="query-response">Lorem ipsum dolor sit amet</p>
                </div>

            </div>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Gender</th>
                            <th>Course</th>
                            <th>Year Level</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr class='table-row-data'>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['middle_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['gender']; ?></td>
                                <td><?php echo $row['course_id']; ?></td>
                                <td><?php echo $row['year_level']; ?></td>
                                <td><?php echo $row['role']; ?></td>
                                <td>
                                    <div class='actions'>
                                        <button class="edit-btn action-icon"><img class="edit-icon" src="../assets/icons/edit-solid.svg"></button>
                                        <button class="delete-btn action-icon"><img class="delete-icon" src="../assets/icons/trash-alt-regular.svg"></button>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "No records found.";
                    }
                    ?>

                </table>
            </div>
            <div class="add-action-container">
                <button class="add-btn action-icon">
                    <img class="add-icon" src="../assets/icons/plus-solid.svg">
                </button>
            </div>
        </div>
    </div>
    <!-- <script type="module" src="js/admin.js"></script> -->

</body>

</html>