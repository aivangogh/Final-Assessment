<?php
session_start();

if (isset($_SESSION["id"]) && isset($_SESSION["role"])) {
    if ($_SESSION["role"] === "admin") {
        require_once "../php/db.inc.php";
        require_once "../php/functions.inc.php";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/Logo_of_Bukidnon_State_University.png">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/util.css">
    <title>Admin | BUKSU E-learn</title>
</head>

<body>
    <div class="container">
        <div class="card table">
            <div class="header">
                <span>Admin</span>
                <button onclick="location.href='../php/logout.inc.php';" class="logout-btn" type="button">Logout</button>
            </div>
            <div class="table-data">
                <table class="table-data">
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

                    <?php getUsers($conn); ?>

                </table>

            </div>
            <div class="add-action-container">
                <button class="add-btn action-icon">
                    <img class="add-icon" src="../assets/icons/plus-solid.svg">
                </button>
            </div>
        </div>
    </div>
    <div class="modal">
        <div class="modal-container card" style="display: none;">
            <div class="modal-header-container">
                <span class="modal-header">Modal</span>
            </div>
            <form action="">
                <div class="left-column">
                    <div class="first-name input-container">
                        <label class="input-header">First Name</label>
                        <input type="text" name="first-name" placeholder="First Name">
                    </div>
                    <div class="middle-name input-container">
                        <label class="input-header">Middle Name</label>
                        <input type="text" name="middle-name" placeholder="Middle Name">
                    </div>
                    <div class="last-name input-container">
                        <label class="input-header">Last Name</label>
                        <input type="text" name="last-name" placeholder="Last Name">
                    </div>
                    <div class="phone input-container">
                        <label class="input-header">Phone</label>
                        <input type="text" name="phone" placeholder="Phone">
                    </div>
                    <div class="id input-container">
                        <label class="input-header">Gender</label>
                        <div class="gender-radio">
                            <label for="gender">
                                <input type="radio" name="gender" id="male">
                                Male
                            </label><label for="gender">
                                <input type="radio" name="gender" id="female">
                                Female
                            </label>
                        </div>
                    </div>
                </div>
                <div class="right-column">
                    <div class="id input-container">
                        <label class="input-header">ID</label>
                        <input type="text" name="input" placeholder="ID">
                    </div>
                    <div class="email input-container">
                        <label class="input-header">University Email</label>
                        <input type="text" name="email" placeholder="University Email">
                    </div>
                    <div class="college input-container">
                        <label class="input-header">College</label>
                        <select name="college" id="college">
                            <option value="college" name="college" disabled selected>College</option>
                        </select>
                    </div>
                    <div class="course input-container">
                        <label class="input-header">Course</label>
                        <select name="course" id="course">
                            <option value="" name="course" disabled selected hidden>Course</option>
                            <option value="" name="course" disabled>Select college first</option>
                        </select>
                    </div>
                    <div class="year-level input-container">
                        <label class="input-header">Year Level</label>
                        <select name="year-level" id="year-level">
                            <option value="year-level" name="year-level" disabled selected>Year Level</option>
                        </select>
                    </div>

                </div>
            </form>
            <div class="password input-container">
                <label class="input-header">Password</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="modal-actions action-btn">
                <button class="action-save-btn">Save</button>
                <button class="action-cancel-btn">Cancel</button>
            </div>
        </div>
    </div> <!-- End of modal -->
    <div class="modal">
        <div class="delete-modal-container card" style="display: none;">
            <p class="prompt-msg">Do you really want to delete this row?</p>
            <div class="log-info">
                <p>ID: <span class="prompt-id">xxx</span></p>
                <p>Email: <span class="prompt-email">xxx</span></p>
                <p>First Name: <span class="prompt-first-name">xxx</span></p>
                <p>Middle Name: <span class="prompt-middle-name">xxx</span></p>
                <p>Last Name: <span class="prompt-last-name">xxx</span></p>
                <p>Phone: <span class="prompt-phone">xxx</span></p>
                <p>Gender: <span class="prompt-gender">xxx</span></p>
                <p>Course: <span class="prompt-course">xxx</span></p>
                <p>Year: <span class="prompt-year-level">xxx</span></p>
                <p>Role: <span class="prompt-role">xxx</span></p>
            </div>
            <div class="delete-actions action-btn">
                <button class="action-delete-btn">Delete</button>
                <button class="action-cancel-btn">Cancel</button>
            </div>
        </div>
    </div>

    <div id="overlay"></div>
    <script src="../js/admin.js"></script>
</body>

</html>