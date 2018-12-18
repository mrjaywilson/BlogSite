<!--

    Project name:       Bloggy Blog
    Project Version:    1.1
    Module Name:        Register.php
    Module Version:     1.23
    Module Description: handles the registration for new users.
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
            REGISTRATION
            <br />
            <label align="center" style="color: red; font-size: 14px">
                All fields required.<br />
            </label>
            <br/>
        </div>

        <form action="../Controllers/RegisterController.php" method="post">

            <div id="login-container">
                <label for="firstname"><b>First Name</b></label>
                <input type="text" placeholder="" name="firstname" required>

                <label for="lastname"><b>Last Name</b></label>
                <input type="text" placeholder="" name="lastname" required>

                <label for="email1"><b>Email Address</b></label>
                <input type="text" id="email1" placeholder="" name="email1" required oninput="verifyEmailMatch();"
                       pattern="/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/">

                <label for="email2"><b>Confirm Email</b></label>
                <input
                    type="text" id="email2" placeholder="" name="email2" oninput="verifyEmailMatch();" required
                    pattern="/[a-zA-Z0-9_-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/">

                <label for="username"><b>Username</b></label> <br/>
                <label align="center" style="color: red; font-size: 14px">
                    WARNING: Cannot be changed later.<br />
                </label>
                <input type="text" class="tooltip" placeholder="" name="username" required>

                <label for="password"><b>Password</b></label>
                <input type="password" id="pass1" name="password" class="tooltip" oninput="verifyPasswordMatch()" onfocus="withFocus(this)" onblur="withBlur(this)" placeholder="" name="password" title="Password MUST contain a minimum of eight characters, at least one letter, and one number." required
                       >

                <label for="verifypassword"><b>Verify Password</b></label>
                <input type="password" id="pass2" class="tooltips" oninput="verifyPasswordMatch()" onfocus="withFocus(this)" onblur="withBlur(this)" placeholder="" name="verify password" title="Password MUST contain a minimum of eight characters, at least one letter, and one number." required>

                <label><b>Set Permission</b></label><br/>

                <!-- The type of blog post -->
                <select id="pub-type" name="status" style="width: 100%">
                    <option value="admin">Administrator</option>
                    <option value="standard">Standard User</option>
                </select><br/><br/><br/>

                <button type="submit" name="register">Register</button>
                <button type="button" name="cancel" onclick="location.href='login.php?value=1'">Back</button>

                <label>
                    <input type="checkbox" checked="unchecked" name="remember" required>
                    Agree to <a href="PrivacyPolicy.php" target="_blank">Privacy Policy</a>
                </label>

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
                        email1.style.backgroundColor = "red"
                        email2.style.backgroundColor = "red"
                    } else {
                        email1.style.backgroundColor = "green"
                        email2.style.backgroundColor = "green"
                    }
                }

                // Verify the passwords match
                function verifyPasswordMatch() {
                    var pass1 = document.getElementById("pass1");
                    var pass2 = document.getElementById("pass2");

                    if(pass1.value != pass2.value) {
                        pass1.style.backgroundColor = "red"
                        pass2.style.backgroundColor = "red"
                    } else {
                        pass1.style.backgroundColor = "green"
                        pass2.style.backgroundColor = "green"
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