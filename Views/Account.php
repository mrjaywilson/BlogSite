<?php
/**

    Project name:       Bloggy Blog
    Project Version:    1.1
    Module Name:        Account.php
    Module Version:     0.1 (Beta / Temp)
    Module Description: A Temporary account page for testing.
 *                      NO LONGER IN USE, BUT WILL BE IN THE FUTURE.
    Developers:         Jay Wilson, Julian Silvestre
    Date:               10.25.2018

 */

// Include Classes
require_once '../Models/User.php';

// Start session
session_start();

// Assign variable the session object
$user = $_SESSION['user'];

// Output info to screen for temporary account page
echo "<h1>Temporary Account Info Page!</h1><br /><br />";

echo "User Name:  " . $user->GetUsername() . "<br />";
echo "First Name: " . $user->GetFirstName() . "<br />";
echo "Last Name:  " . $user->GetLastName() . "<br />";
echo "Password:   " . $user->GetPassword() . "<br />";
echo "Email:      " . $user->GetEmail() . "<br />";

?>