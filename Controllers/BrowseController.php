<?php
/**

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        BrowseController.php
Module Version:     1.0
Module Description: Controller to handle interaction between the business layer,
the model layer, and the View layer for login.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.18.2018

 */

$author = "";
$content = "";
$sort = "unsorted";

if (isset($_POST['author-sort'])) {
    $author = $_POST['author-sort'];
    $sort = "sorted";
} else {
    $author = 0;
}

if (isset($_POST['post-sort'])) {
    $content = $_POST['post-sort'];
    $sort = "sorted";
} else {
    $content = 0;
}

if ($sort == "unsorted") {
    echo $author;
    echo $content;
    echo $sort;

    echo "<script>window.location = '../Views/BrowseBlogs.php?value=$sort'</script>";
} else {
    echo $author . " else<br/>";
    echo $content . " else<br/>";
    echo $sort . " else<br/>";

    echo "<script>window.location = '../Views/BrowseBlogs.php?value=$sort&author=$author&content=$content'</script>";
}

?>