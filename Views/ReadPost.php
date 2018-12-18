<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        ReadPost.php
Module Version:     2.0
Module Description: A simple page to view blog posts.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.11.2018

--><?php include '../Views/Layout/data.php';?><html>
<head>
    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<header>
    <?php include 'Layout/Header.php'; ?>
</header>

<body>

<?php
$postdata = null;

$db = new Database("localhost");

if (isset($_GET['username']) && isset($_GET['postid'])) {

    $post_username = $_GET['username'];
    $post_id = $_GET['postid'];

    $postdata = $db->GetPostById($_GET['username'], $_GET['postid']);

    $ratingTotal = 0;

    $comments = $db->GetAllCommentsForPost($post_id);

    $temp = 0;

    foreach ($comments as $comment) {
        $temp += 1;
        $ratingTotal = $ratingTotal + $comment->getRating();
    }
}
?>

<div id="formdiv">
    <div align="center" id="page-title">
        <br/>
        <?php
        echo $postdata->GetTitle();
        ?>
    </div>
    <form action="../Controllers/BlogController.php" method="POST">

        <div id="post-container" align="left" style="width: 80%;">
           <p align="center">
                <?php

                $average = 0;

                if ($ratingTotal > 0) {
                    $average = $ratingTotal / $temp;
                }

                echo "Overall Post Rating: " . round($average, 1);
                ?>
           </p><br/><br/>

            <!-- user inputs blog content in the textarea -->
            <p>
                <?php
                echo $postdata->GetContent();
                ?>
            </p><br/>

            <!-- buttons -->
            <button type="submit" id="back">Browse Other Blogs</button>
        </div>
    </form>
    <form action="../Controllers/CommentController.php" method="POST">
        <div id="post-container" align="left" style="width: 80%;">
            <br />
            <hr>
            <div align="center" id="page-title">
                <br/>
                COMMENT
                <br/>
                <br/>
            </div>
            <br />
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    include_once '../Views/Layout/Comment.php';
                } else {
                    echo "<h3>Please login to view or make a comment...</h3>";
                }
            ?>
        </div>
    </form>
</div>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>
<?php