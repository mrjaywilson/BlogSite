<?php

/**

    Project name:       Bloggy Blog
    Project Version:    2.0
    Module Name:        index.php
    Module Version:     2.0
    Module Description: The main redirect to the landing page.
    Developers:         Jay Wilson, Julian Silvestre
    Date:               11.16.2018

*/

//include_once '../Models/Blog.php';

// Go directly to login page
// TODO: Redirect to a new landing page that shows the 'browse blogs' page.
header('Location: Views/login.php?value=1');
// header('Location: Views/CommonLayout/Header.php');

?>