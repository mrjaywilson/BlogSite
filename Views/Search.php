<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        Search.php
Module Version:     1.22
Module Description: A blog search page that allows user to search blog content and titles.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.16.2018

--><?php include '../Views/Layout/data.php';?><html>
<head>
    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<header>
    <?php include 'Layout/Header.php'; ?>
</header>

<body>
<div id="formdiv">

    <div align="center" id="page-title">
        <br />
        SEARCH RESULTS
        <br />
        <br />
    </div>

    <form class="search-stuff" action="../Controllers/SearchController.php">

        <div id="content-container">
            <div id="filter-box">
                <table id="filter-table">
                    <tr>
                        <td id="filter-title" style="width: 50%;">
                            New Search
                        </td>
                        <td>
                            <input type="text" id="searchbox" name="search-box" placeholder="Search...">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>

    <form action="../Controllers/SearchController.php" method="POST" style="padding-top: 40px">

        <!-- Get Information -->
        <?php

        $db = new Database('localhost');

        $output = null;

        if (isset($_GET['value']))
            $value = $_GET['value'];

        $output = $db->SearchAllPosts($value);

        // Show the blogs
        foreach ($output as $post) {

            echo "<div align=\"left\" id=\"browse-title\">";
            echo "<br/>";
            echo $post->GetTitle();
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