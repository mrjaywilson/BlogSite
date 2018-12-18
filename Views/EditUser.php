<!--

    Project name:       Bloggy Blog
    Project Version:    2.0
    Module Name:        EditUser.php
    Module Version:     1.1
    Module Description: handles editing users rights and info.
    Developers:         Jay Wilson, Julian Silvestre
    Date:               11.11.2018

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
        Registration form for registering new users.
     -->

    <div align="center" id="page-title">
        <br />
        EDIT USER
        <br />
        <label align="center" style="color: red; font-size: 14px">
            All fields with * required.<br />
        </label>
        <br/>
    </div>

    <form action="../Controllers/EditUserController.php" method="post">

        <?php
        $db = new Database('localhost');

        $username = $_GET['value'];

        $user = $db->GetUser($username);
        ?>

        <div id="login-container">
            <label for="firstname"><b>First Name*</b></label>
            <?php
                echo "<input type=\"text\" value=" . $user->GetFirstName() . " name=\"firstname\" required>";
            ?>

            <label for="lastname"><b>Last Name*</b></label>

            <?php
                echo "<input type=\"text\" value=" . $user->GetLastName() . " name=\"lastname\" required>";
            ?>

            <label for="email1"><b>Email Address*</b></label>
            <?php
                echo "<input type=\"text\" id=\"email1\" value=" . $user->GetEmail() . " name=\"email1\" required oninput=\"verifyEmailMatch();\"
                   pattern=\"/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/\">";
            ?>

            <label for="email2"><b>Confirm Email*</b></label>
            <?php
                echo "<input type=\"text\" id=\"email2\" value=" . $user->GetEmail() . " name=\"email2\" oninput=\"verifyEmailMatch();\" required
                pattern=\"/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/\">";
            ?>

            <label for="username"><b>Username</b></label> <br/>
            <label align="center" style="color: red; font-size: 14px">
                Cannot be changed.<br />
            </label>
            <?php
                echo "<input type=\"text\" class=\"tooltip\" value=" . $user->GetUserName() . " name=\"username\" readonly>";
            ?>

            <label for="password"><b>Password*</b></label>
            <?php
            echo "<input type=\"password\" id=\"pass1\" class=\"tooltips\" oninput=\"verifyPasswordMatch()\" onfocus=\"withFocus(this)\" onblur=\"withBlur(this)\" value=" . $user->GetPassword() . " name=\"password\" title=\"Password MUST contain a minimum of eight characters, at least one letter, and one number.\" required>";
            ?>

            <label for="verifypassword"><b>Verify Password*</b></label>
            <?php
               echo "<input type=\"password\" id=\"pass2\" class=\"tooltips\" oninput=\"verifyPasswordMatch()\" onfocus=\"withFocus(this)\" onblur=\"withBlur(this)\" value=" . $user->GetPassword() . " name=\"verify password\" title=\"Password MUST contain a minimum of eight characters, at least one letter, and one number.\" required>";
            ?>

            <label><b>Set Permission*</b></label><br/>

            <?php
                if ($user->GetPermission() == 1) {
                    $admin = "selected";
                    $standard = "";
                } else {
                    $admin = "";
                    $standard = "selected";
                }

                echo "<select id=\"pub-type\" name=\"status\" style=\"width: 100%\">";
                echo "<option value=\"admin\" $admin>Administrator</option>";
                echo "<option value=\"standard\" $standard>Standard User</option>";
                echo "</select><br/><br/><br/>";
            ?>
            <br/>

            <button type="submit" name="save">Save User</button>
            <button type="button" name="cancel" onclick="location.href='UserAdmin.php'">Back</button>

            <div id="tooltip"></div>
        </div>
        <script type="text/javascript">

            // For adding a small tooltip to let user know proper constraints
            function withFocus(obj) {
                var tooltip = document.getElementById("tooltip");
                tooltip.innerHTML = obj.title;
                tooltip.style.display = "block";
                tooltip.style.top = obj.offsetTop + obj.offsetHeight + "px";
                tooltip.style.left = obj.offsetLeft + "px";
            }

            // For adding a small tooltip to let user know proper constraints
            function withBlur(obj) {
                var tooltip = document.getElementById("tooltip");
                tooltip.style.display = "none";
                tooltip.style.top = "-9999px";
                tooltip.style.left = "-9999px";
            }

            // Verify the email addresses match
            function verifyEmailMatch() {
                var email1 = document.getElementById("email1");
                var email2 = document.getElementById("email2");

                if(email1.value != email2.value) {
                    email1.style.backgroundColor = "lightcoral"
                    email2.style.backgroundColor = "lightcoral"
                } else {
                    email1.style.backgroundColor = "aliceblue"
                    email2.style.backgroundColor = "aliceblue"
                }
            }

            // Verify the passwords match
            function verifyPasswordMatch() {
                var pass1 = document.getElementById("pass1");
                var pass2 = document.getElementById("pass2");

                if(pass1.value != pass2.value) {
                    pass1.style.backgroundColor = "lightcoral"
                    pass2.style.backgroundColor = "lightcoral"
                } else {
                    pass1.style.backgroundColor = "aliceblue"
                    pass2.style.backgroundColor = "aliceblue"
                }
            }
        </script>
    </form>
</div>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>