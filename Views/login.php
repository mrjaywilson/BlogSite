<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        Login.php
Module Version:     2.0
Module Description: A simple login page that uses authentication and authorization
                    to give the user access to the member content of the website.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.16.2018

--><?php include '../Views/Layout/data.php';?><html>
<head>
    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<header>
    <?php include 'Layout/Header.php'; ?>
</header>

<body>

<div id="formdiv">

    <!--
        Create the form for logging in
        Most attributes for style will be put into the assigned Stylesheet
     -->

    <div align="center" id="page-title">
        <br />
        LOGIN
        <br />
        <br />
    </div>

    <form action="../Controllers/LoginController.php" method="post">
        <div id="login-container">
                <div class="imgcontainer">
                    <img src="../images/img_avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="login_div">
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <button type="submit" name="login">LOGIN</button>

                <div align="center" style="color: red; font-size: 10px;">
                    <label>

                        <?php
                            // Check to see if the page is a login error or a new
                            // login request to show the proper error message

                            if ($_GET['value'] == 0) {
                                echo "Incorrect Username and/or Password. <br />";
                                echo "Try again or click 'Forgot Password' below. <br />";
                            } elseif ($_GET['value'] == 2) {
                                echo "You must be logged in to do that.";
                            }
                        ?>
                    </label>
                </div>
            </div>

        </div>
        <div class="container">
            <button type="button" class="registerbtn" onclick="location.href='Register.php'">REGISTER</button>
            <span class="password"><a href="PrivacyPolicy.php" target="_blank">View Privacy Policy</a></span>
        </div>
    </form>
</div>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>