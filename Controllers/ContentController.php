<?php
/**

Project name:       Bloggy Blog
Project Version:    1.1
Module Name:        ContentController.php
Module Version:     1.6
Module Description: Controller to handle interaction between the business layer,
                    the model layer, and the View layer for login.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.11.2018

 */

include '../Business/Database.php';
include '../Models/User.php';

session_start();

$db = new Database("localhost");

if (isset($_POST['edit'])) {
    // Get the post ID
    $id = intval($_POST['edit']);

    $username = $_SESSION["user"]->GetUserName();

    $blogPost = $db->GetPostById($username, $id);

    $_SESSION["blogdata"] = $blogPost;

    echo "<script>window.location = '../Views/EditBlog.php?value=edit'</script>";

    // echo "edit clicked, post ID: " . $test;
} else if (isset($_POST['delete'])) {
    // Get the post ID
    $id = $_POST['delete'];

    $db->DeletePost($id);

    echo "<script>window.location = '../Views/ContentAdmin.php'</script>";
} else if (isset($_POST['view'])) {
    // Get the post ID and username
    $username = $_SESSION["user"]->GetUserName();
    $id = $_POST['view'];



    echo "<script>window.location =\"../Views/ReadPost.php?username=$username&postid=$id\"</script>";
} else if (isset($_POST['new'])) {

    // Go to the new post page
    echo "<script>window.location = '../Views/EditBlog.php?value=new'</script>";
}