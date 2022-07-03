<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style2.css">

    <!-- Image beside title -->
    <link rel="icon" href="../images/icon.ico" />

    <title>Feedback System</title>
</head>

<body>
    <?php
    session_start();


    // Connect to database
    $con = mysqli_connect('localhost', 'root', '', 'smartetuition') or die(mysqli_error($con));

    /*while ($r = mysqli_fetch_assoc($res)) {
            echo "<tr><td>" . $r['classTime'] . "</td><td>" . $r['classSubject'] . "</td><td>" . $r['classDay'] . "</td></tr>";
        }*/
    ?>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <?php
        // Student's navigation
        if (isset($_SESSION['userID']) && $_SESSION['userLevel'] == 3) { ?>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="student.php">
                            <span class="icon">
                                <img src="../images/logocircle.png" alt="Logo Let Us Score!" id="logoLUS" />
                            </span>
                            <!-- <span class="title">Let Us Score</span> -->
                        </a>
                    </li>
                    <li>
                        <a href="student.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="studentdetails.html">
                            <span class="icon">
                                <ion-icon name="options-outline"></ion-icon>
                            </span>
                            <span class="title">Update Details</span>
                        </a>
                    </li>

                    <li>
                        <?php
                        // Construct and run query to check for existing subject registration
                        $q = "SELECT * FROM user u, register r WHERE u.userID=r.stuID AND userID=" . $_SESSION['userID'];
                        $res = mysqli_query($con, $q);
                        $num = mysqli_num_rows($res);

                        if ($res) {
                            if ($num <= 0) {
                                // Will display subject registration option if student does not register yet
                        ?>
                                <a href=register_subject.php>
                                    <span class="icon">
                                        <ion-icon name="person-add-outline"></ion-icon>
                                    </span>
                                    <span class="title">Register Subject(s)</span>
                                </a>
                        <?php
                                mysqli_free_result($res);
                            }
                        }

                        ?>
                    </li>

                    <li>
                        <a href="view_class.php">
                            <span class="icon">
                                <ion-icon name="create-outline"></ion-icon>
                            </span>
                            <span class="title">Class Details</span>
                        </a>
                    </li>

                    <li>
                        <a href=feedback.php>
                            <span class="icon">
                                <ion-icon name="help-outline"></ion-icon>
                            </span>
                            <span class="title">Feedback</span>
                        </a>
                    </li>

                    <li>
                        <a href=logout.php>
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        <?php
        }
        // Admin's navigation
        else if (isset($_SESSION['userID']) && $_SESSION['userLevel'] == 1) { ?>
            <div class="navigation">
                <ul>
                    <li>
                        <a href="admin.php">
                            <span class="icon">
                                <img src="../images/logocircle.png" alt="Logo Let Us Score!" id="logoLUS" />
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="admin.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href=".php">
                            <span class="icon">
                                <ion-icon name="create-outline"></ion-icon>
                            </span>
                            <span class="title">Manage User Data</span>
                        </a>
                    </li>

                    <li>
                        <a href="verify_subject.php">
                            <span class="icon">
                                <ion-icon name="person-add-outline"></ion-icon>
                            </span>
                            <span class="title">Manage Class Verification</span>
                        </a>
                    </li>



                    <li>
                        <a href="manage_class.php">
                            <span class="icon">
                                <ion-icon name="create-outline"></ion-icon>
                            </span>
                            <span class="title">Manage Class Details</span>
                        </a>
                    </li>

                    <li>
                        <a href=.php>
                            <span class="icon">
                                <ion-icon name="help-outline"></ion-icon>
                            </span>
                            <span class="title">Manage Class Registration</span>
                        </a>
                    </li>

                    <li>
                        <a href=feedback.php>
                            <span class="icon">
                                <ion-icon name="help-outline"></ion-icon>
                            </span>
                            <span class="title">Feedback Report</span>
                        </a>
                    </li>

                    <li>
                        <a href=logout.php>
                            <span class="icon">
                                <ion-icon name="log-out-outline"></ion-icon>
                            </span>
                            <span class="title">Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        <?php
        }
        ?>
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/xhebrhsj.json" trigger="loop-on-hover" colors="primary:#121331" state="hover" style="width:45px;height:45px">
                    </lord-icon>
                </div>

                <!-- 
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here" />
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                
                <div class="user">
                    <img src="../images/icons/user-solid.svg" alt="" />
                </div>
                -->
            </div>
            <!-- ================ Order Details List ================= -->
            <?php
            // Student's
            if (isset($_SESSION['userID']) && $_SESSION['userLevel'] == 3) { ?>
                <div class="details" style="display: inline-block;">
                    <div class="recentOrders">
                        <!-- 1 -->
                        <div class="cardHeader">
                            <h2>Feedback System</h2>
                        </div>
                        <form method="post" action="feedback_save.php">
                            <table>
                                <?php
                                $q = "SELECT userName FROM user WHERE userID=" . $_SESSION['userID'];
                                $res = mysqli_query($con, $q);
                                $r = mysqli_fetch_assoc($res);
                                ?>

                                <tr>
                                    <td>Name:</td>
                                    <td>
                                        <?php
                                        echo $r['userName'];
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <?php
                                    date_default_timezone_set('Asia/Singapore');
                                    $date = date('d-m-y h:i:s A');
                                    ?>
                                    <td>Date:</td>
                                    <td>
                                        <?php
                                        echo $date;
                                        ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Title:</td>
                                    <td>
                                        <input type="text" height="1000px" placeholder="Enter your title" name="fbTitle" size="76" required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Comment:</td>
                                    <td>
                                        <textarea placeholder="Enter your comment" rows="8" cols="80" name="fbComment" required></textarea>
                                    </td>
                                </tr>
                            </table>
                            <button type="submit" class="btn" name="submitFbButton" value="Submit">
                                <span class="btnText"> Submit </span>
                            </button>

                            &nbsp;&nbsp;&nbsp;

                            <button type="reset" class="btn">
                                <span class="btnText"> Reset </span>
                            </button>
                        </form>

                        <br>
                        <br>

                        <!-- 2 -->
                        <div class="cardHeader">
                            <h2>
                                My Feedback(s)
                            </h2>

                        </div>
                        <?php
                        // Construct and run query to list user's feedbacks
                        $q = "SELECT * FROM feedback WHERE stuID=" . $_SESSION['userID'];
                        $res = mysqli_query($con, $q);
                        ?>
                        <table style="width: 1500px;">
                            <thead>
                                <tr>
                                    <td style="width:100px;">ID</td>
                                    <td style="width:200px;">Title</td>
                                    <td style="width:1000px;">Comment</td>
                                    <td style="width:200px;">Date Submitted</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($r = mysqli_fetch_assoc($res)) {
                                    echo    "<tr>
                                                <td>" . $r['fbID'] . "</td>
                                                <td>" . $r['fbTitle'] . "</td>
                                                <td>" . $r['fbComment'] . "</td>
                                                <td>" . $r['fbDate'] . "</td>
                                            </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php
                // Admin's
            } else if (isset($_SESSION['userID']) && $_SESSION['userLevel'] == 1) {
                // Construct and run query to list all students' feedbacks
                $q = "SELECT * FROM feedback";
                $res = mysqli_query($con, $q);
            ?>
                <div class="details" style="display: inline-block;">
                    <div class="recentOrders">
                        <!-- 1 -->
                        <div class="cardHeader">
                            <h2>Feedback System</h2>
                        </div>
                        <?php
                        // Construct and run query to check for existing class
                        $res = mysqli_query($con, $q);
                        $num = mysqli_num_rows($res);
                        if ($res) {
                            if ($num > 0) {
                        ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <td>ID</td>
                                            <td>Title</td>
                                            <td>Comment</td>
                                            <td>Date Submitted</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <form method='post' action='feedback_delete.php'>
                                            <?php
                                            while ($r = mysqli_fetch_assoc($res)) {
                                                echo    "<tr>
                                            <input type='hidden' name='fbID' value=" . $r['fbID'] . ">
                                            <td>" . $r['fbID'] . "</td>
                                            <td>" . $r['fbTitle'] . "</td>
                                            <td>" . $r['fbComment'] . "</td>
                                            <td>" . $r['fbDate'] . "</td>
                                            <td>
                                                <button type='submit' name='deleteFbButton'>
                                                    <img src='../images/icons/trash-can-solid.svg' height='25px' />
                                                </button>
                                            </td>
                                        </tr>";
                                            }
                                            ?>
                                        </form>
                                    </tbody>
                                </table>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php

            } else {
                header("Location: feedback.php");
            }
            ?>
            <!-- JS scripts -->
            <script src="../js/dash.js"></script>
            <script src="../js/script.js"></script>
            <!-- ionicons -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

            <?php
            // Clear results and close the connection
            mysqli_close($con);
            mysqli_free_result($res);
            ?>
</body>

</html>