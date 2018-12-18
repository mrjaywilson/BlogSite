<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        Login.php
Module Version:     2.0
Module Description: A simple login page that uses authentication and authorization
                    to give the user access to the member content of the website.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.16.2018

-->
<html>
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

    <div align="center" id="page-title" style="height: 100%">
        <br />
        <br />
        <br />
        <?php
            if (isset($_GET['value'])) {
                if ($_GET['value'] = true) {
                    echo "Logging out...";

                    $_SESSION['loggedin'] = false;
                    session_destroy();

                    echo "<script>window.location = '../Views/login.php?value=1'</script>";
                }
            } else {

            }
        ?>
    </div>
</div>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>