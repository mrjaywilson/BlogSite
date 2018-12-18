<?php
/**

Project name:       Bloggy Blog
Project Version:    1.1
Module Name:        User.php
Module Version:     1.0
Module Description: User class that handles the User object.
Developers:         Jay Wilson, Julian Silvestre
Date:               10.24.2018

 */

// Class Declaration
class User
{
    // Private members
    private $firstName;
    private $lastName;
    private $userName;
    private $password;
    private $email;
    private $perm;

    // User constructor
    public function __construct($firstName, $lastName, $userName, $password, $email, $perm)
    {
        // Set variables
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->password = $password;
        $this->email = $email;
        $this->perm = $perm;
    }

    // Getters / Setters
    public function GetPermission() {
        return $this->perm;
    }

    public function SetPermission($perm) {
        $this->perm = $perm;
    }

    public function GetFirstName() {
        return $this->firstName;
    }

    public function SetFirstName($firstName) {
        // Checked using form validation
        $this->firstName = $firstName;
    }

    public function GetLastName() {
        return $this->lastName;
    }

    public function SetLastName($lastName) {
        // Checked using form validation
        $this->lastName = $lastName;
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

    public function GetEmail() {
        return $this->email;
    }

    public function SetEmail($email) {
        // Checked for correct email format through form
        // validation
        $this->email = $email;
    }
}