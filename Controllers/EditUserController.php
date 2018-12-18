<?php
/**

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        EditUserController.php
Module Version:     1.12
Module Description: Controller to handle interaction between the business layer,
the model layer, and the View layer for login.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.19.2018

 */

include '../Business/Database.php';
include '../Models/User.php';

session_start();

$db = new Database("localhost");

if (isset($_POST['save'])) {

    // Update the user in the database
    if ($_POST['status'] == "admin") {
        $perm = 1;
    } else {
        $perm = 0;
    }

    $db->UpdateUser(
        $_POST['username'],
        $_POST['password'],
        $perm,
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['email1']
    );

    echo "<script>window.location = '../Views/UserAdmin.php'</script>";
}