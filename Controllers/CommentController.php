<?php

include_once '../Business/Database.php';
include '../Models/User.php';
//inlcude '../Models/Comment.php';

session_start();

if (isset($_POST['submit-comment'])) {

    $username = $_POST['post_username'];
    $id = $_POST['post_id'];

    $rating = 3;
    $content = $_POST['comment-content'];

    $dbs = new Database('localhost');

    if (isset($_POST['rate'])) {

        $temp = $_POST['rate'];

        if ($temp == "5 - Loved it!") {
            $rating = 5;
        } else if ($temp == "4 - So good!") {
            $rating = 4;
        } else if ($temp == "3 - So-So...") {
            $rating = 3;
        } else if ($temp == "2 - Didn't Like") {
            $rating = 2;
        } else if ($temp == "1 - Hated it") {
            $rating = 1;
        } else if ($temp == "0 - Worst Content Ever") {
            $rating = 0;
        }
    }

    $user = $_SESSION["user"]->GetUserName();

    $dbs->AddNewComment($id, $user, $content, $rating);

    echo "<script>window.location =\"../Views/ReadPost.php?username=$username&postid=$id\"</script>";
}

?>