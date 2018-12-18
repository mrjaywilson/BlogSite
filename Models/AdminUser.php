<?php
/**

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        AdminUser.php
Module Version:     1.0
Module Description: Handles the user object for administration purposes.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.18.2018

 */

// Class Declaration
class AdminUser
{
    // Private members
    private $userName;
    private $password;
    private $perm;

    // User constructor
    public function __construct($userName, $password, $perm)
    {
        // Set variables
        $this->userName = $userName;
        $this->password = $password;
        $this->perm = $perm;
    }

    // Getters / Setters
    public function GetPermission() {
        return $this->perm;
    }

    public function SetPermission($perm) {
        $this->perm = $perm;
    }

    public function GetUserName() {
        return $this->userName;
    }

    public function SetUserName($userName) {
        // Checked using form validation
        $this->userName = $userName;
    }

    public function GetPassword() {
        return $this->password;
    }

    public function SetPassword($password) {
        // Checked using form validation
        $this->password = $password;
    }
}