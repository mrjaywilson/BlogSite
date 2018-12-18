<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        BrowseBlogs.php
Module Version:     1.22
Module Description: A blog browsing page that allows various filters.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.16.2018

--><?php include '../Views/Layout/data.php';?><html>
<head>
    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<header>
    <?php include 'Layout/Header.php'; ?>
</header>

<body>
<div id="formdiv">

    <div align="center" id="page-title">
        <br />
        BROWSING BLOGS
        <br />
        <br />
    </div>

    <form action="../Controllers/BrowseController.php" method="POST">

        <div id="content-container">
            <div id="filter-box">
                <table id="filter-table">
                    <tr>
                        <td id="filter-title" colspan="2">Filter Results</td>
                    </tr>
                    <tr>
                        <td id="filter-title" style="width: 50%;">
                            By Author
                        </td>
                        <td>
                            <input type="text" id="" name="author-sort">
                        </td>
                    </tr>
                    <tr>
                        <td id="filter-title" style="width: 50%;">
                            By Post Content
                        </td>
                        <td>
                            <input type="text" id="" name="post-sort">
                        </td>
                    </tr>
                    <tr id="filter-title">
                        <td colspan="2">
                                <button type="submit" id="filter_button" style="float: right;">Go!</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>

    <form action="../Controllers/BlogController.php" method="POST" style="padding-top: 40px">

        <!-- Get Information -->
        <?php

        $db = new Database('localhost');

        $output = null;

        if (isset($_GET['value']))
            $value = $_GET['value'];

        if (isset($_GET['author']))
            $author = $_GET['author'];

        if (isset($_GET['content']))
            $content = $_GET['content'];

        if ($value == "unsorted") {
            // get all blogs from recent
            $output = $db->GetAllPostsToBrowse(0, 0);
        } else if ($value == "sorted") {
            $output = $db->GetAllPostsToBrowse($author, $content);
            // Get only sorted blogs
/*            if ($author != 0 && isset($_GET['content'])) {
                // do author and content pull
                $output = $db->GetAllPostsToBrowse($_GET['author'], $_GET['content']);
            } else if (isset($_GET['author'])) {
                // do author pull
                $output = $db->GetAllPostsToBrowse($_GET['author'], 0);
            } else if (isset($_GET['content'])) {
                // do content pull
                $output = $db->GetAllPostsToBrowse(0, $_GET['content']);
            } else {
                // get all blogs from recent if nothing set
                $output = $db->GetAllPostsToBrowse(0, 0);
            }*/
        }

        // Show the blogs
        foreach ($output as $post) {

            echo "<div align=\"left\" id=\"browse-title\">";
            echo "<br/>";
            echo "<h3><a href=\"../Views/ReadPost.php?username=" . $post->GetAuthor() . "&postid=" . $post->GetId() . "\">" . $post->GetTitle() . "</a></h3>";
            //echo $post->GetTitle();
            echo "</div>";
            echo "<div align=\"left\" id=\"browse-author\">";
            echo 'Author: ' . $post->GetAuthor() . ', ' . $post->GetTimestamp();
            echo "</div>";
            echo "<br/>";
            echo "<br/>";

            echo "<div id=\"browse-post\" align=\"left\" style=\"width: 80%;\">";
            echo $post->GetContent();
            echo "<br/>";
            echo "<br/>";
            echo "<hr>";
            echo "</div>";
            echo "<br/>";
            echo "<br/>";
        }

        ?>
    </form>
</div>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>


<?php