<?php
/**

    Project name:       Bloggy Blog
    Project Version:    1.1
    Module Name:        LoginController.php
    Module Version:     1.22
    Module Description: Controller to handle interaction between the business layer,
                        the model layer, and the View layer for login.
    Developers:         Jay Wilson, Julian Silvestre
    Date:               10.25.2018

 */

// include classes
include '../Business/Database.php';
include '../Models/User.php';

// start a new session
session_start();

// Check request method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // If login clicked...
    if (isset($_POST['login'])) {

        // Create new database object
        $db = new Database('localhost:3308');

        // store password in session variable
        $_SESSION[("authenticate")] = $db->GetPassword($_POST['username']);

        if ($_POST['password'] == $_SESSION[("authenticate")]) {

            $loginuser = $_POST['username'];

            // Store user retrieved from database in session variable
            $_SESSION["user"] = $db->GetUser($loginuser);

            // Clean out session variable and flag as user logged in
            $_SESSION["authenticate"] = "";
            $_SESSION["loggedin"] = true;

            if ($_SESSION["user"]->GetPermission() == 1) {
                $_SESSION["admin"] = true;
            } else {
                $_SESSION["admin"] = false;
            }

            // TODO: #1 - Check the database to see if the user has a created their secret questions
            // TODO: Hook to the forgot password stuff

            // TODO: #2 - Connect the Remember Me and add a cookie to the users browser

            // Open temporary contentAdmin page for testing
            echo "<script>window.location = '../Views/ContentAdmin.php'</script>";
        } else {
            // Go back to login page if issues
            header('Location: ../Views/login.php?value=0');
        }
    }
}

?>