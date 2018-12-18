<?php
/**

Project name:       Bloggy Blog
Project Version:    1.1
Module Name:        BlogController.php
Module Version:     1.5
Module Description: Controller to handle interaction between the business layer,
                    the model layer, and the View layer for login.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.11.2018

 */

// Include the classes to use
include '../Models/User.php';
include '../Models/Blog.php';
include '../Business/Database.php';

// TODO: Handle the session check etc...
session_start();

$db = new Database("localhost:3308");

// Get the content of the blog post with the bad words removed.
$result = implode(" ",filter($_POST['blogeditor']));

// Add a new blog post.
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['edit'] == false) {
        $db->CreateNewBlog(
            $_SESSION['user']->GetUserName(),
            implode(" ",filter($_POST['title'])),
            date("Y-m-d H:i:s"),
            implode(" ",filter($_POST['blogeditor'])),
            $_POST['status']);
    } else {
        // Update method
        $db->UpdateBlog(
            implode(" ", filter($_POST['title'])),
            implode(" ", filter($_POST['blogeditor'])),
            $_POST['status'],
            $_SESSION['blogdata']->GetId()
        );
    }

    header('Location: ../Views/BrowseBlogs.php?value=unsorted');

} else {
    // Go back to login page if issues
    header('Location: ../Views/login.php?value=2');
}

// Filter the passwords and turn them into "****"
function filter($str)
{
    // This is just a small pool. In a real production environment,
    // we would instead implement a qualified and well-designed
    // dictionary.
    $bad = array("shit", "ass", "crap", "fuck", "goddamn", "damn");

    // Get the words
    $piece = explode(" ",$str);

    // Go through and check for bad words. If one is found,
    // turn it into asterisks.
    for($i=0; $i < sizeof($bad); $i++)
    {
        for($j=0; $j < sizeof($piece); $j++)
        {
            if($bad[$i] == $piece[$j])
            {
                $piece[$j] = " **** ";
            }
        }
    }

    return $piece;
}