<?php
/**

    Project name:       Bloggy Blog
    Project Version:    1.1
    Module Name:        RegisterController.php
    Module Version:     1.65
    Module Description: Controller to handle interaction between the business layer,
                        the model layer, and the View layer for registration
    Developers:         Jay Wilson, Julian Silvestre
    Date:               11.11.2018

 */

// Include the classes to use
include '../Models/User.php';
include '../Business/Database.php';

// Declare a new Database service object
$db = new Database('localhost');

if ($_POST['status'] == 'admin') {
    $perm = 1;
} else {
    $perm = 0;
}


// Create a new user in the database
$user = $db->CreateNewUser(
    $_POST['firstname'],
    $_POST['lastname'],
    $_POST['username'],
    $_POST['password'],
    $_POST['email1'],
    $perm);

// Start a new session
session_start();

// Get the newly created user from the database and store in
// session variable
$_SESSION["user"] = $db->GetUser($_POST['username']);

// Go to temporary account info pages
echo "<script>window.location = '../Views/login.php?value=1'</script>";
?>