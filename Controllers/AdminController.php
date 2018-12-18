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

include '../Business/Database.php';
include '../Models/User.php';

session_start();

$db = new Database("localhost");

if (isset($_POST['edit'])) {
    // Get the post ID
    $username = strval($_POST['edit']);

    echo "<script>window.location = '../Views/EditUser.php?value=" . $username ."'</script>";

    // echo "edit clicked, post ID: " . $test;
} else if (isset($_POST['delete'])) {
    // Get the post ID
    $username = strval($_POST['delete']);

    $db->DeleteUser($username);

    echo "<script>window.location = '../Views/UserAdmin.php'</script>";
}