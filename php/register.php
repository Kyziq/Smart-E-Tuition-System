<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Image beside title -->
    <link rel="icon" href="../images/icon.ico" />

    <title>Registration Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css" />
    <!-- Iconscout CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
</head>

<body id="register">
    <div class="logoImage">
        <a href="../home.html">
            <img src="../images/logocircle.png" alt="Logo Let Us Score!" />
        </a>
    </div>
    <div class="container">
        <header>Registration Page</header>
        <form name="registerForm" method="post" action="register_save.php">
            <div class="details personal">
                <br /><br /><br /><br />
                <span class="title">Account Details</span>
                <div class="fields">
                    <div class="input-field">
                        <label>Username<span style="color: red;"> *</span></label>
                        <input type="text" placeholder="Enter your username" name="userUname" id="userUname" required />
                    </div>
                    <div class="input-field">
                        <label>Password<span style="color: red;"> *</span></label>
                        <input type="password" placeholder="Enter your password" name="userPassw" required />
                    </div>
                    <div class="input-field">
                        <label>Email<span style="color: red;"> *</span></label>
                        <input type="text" placeholder="name@domainname" name="userEmail" required />
                    </div>
                </div>
                <div class="details ID">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name<span style="color: red;"> *</span></label>
                            <input type="text" placeholder="Enter your full name" name="userName" required />
                        </div>
                        <div class="input-field">
                            <label>Gender<span style="color: red;"> *</span></label>
                            <select name="userGender" required>
                                <option disabled selected>
                                    Select gender
                                </option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label>Phone Number<span style="color: red;"> *</span></label>
                            <input type="text" placeholder="0123456789" name="userPhone" required />
                        </div>
                        <div class="input-field">
                            <label>Birthdate<span style="color: red;"> *</span></label>
                            <input type="date" name="userBirthdate" required />
                        </div>

                        <div class="input-fieldLong">
                            <label>Address<span style="color: red;"> *</span></label>
                            <input type="text" placeholder="Enter your address" name="userAddress" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <button type="submit" name="registerButton" value="Submit">
                    <span class="btnText"> Register ‎ ‎ ‎</span>
                    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/iifryyua.json" trigger="loop" colors="primary:#ffffff" state="hover-3" style="width: 32px; height: 32px">
                    </lord-icon>
                </button>
            </div>
        </form>
        <span class="text">Already a member?
            <a href="login.php">Login Now</a>
        </span>
    </div>
    <?php

    ?>
    <script src="../js/script.js"></script>
</body>

</html>