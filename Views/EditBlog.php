<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        EditBlog.php
Module Version:     2.0
Module Description: A simple New Blog page to enter new blogs.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.16.2018

-->

<?php

require_once '../Models/Blog.php';

//session_start();

$data = null;
?>

<html>
<head>
    <!-- Scripts -->
    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<header>
    <?php include 'Layout/Header.php'; ?>
</header>

<body>
    <div id="formdiv">
        <form method="POST" action="../Controllers/BlogController.php">

            <div id="content-container">
                <br />
                <div id="page-title">
                    <?php
                    // This test for title is for later when editing posts is
                    // implemented.
                    // This test for title is for later when editing posts is
                    // implemented.
                    if (isset($_GET['value'])) {
                    if (strval($_GET['value']) == "edit") {
                        $data = $_SESSION['blogdata'];
                        echo "EDIT POST";
                        $_SESSION["edit"] = true;
                    } else if (strval($_GET['value']) == "new") {
                        {
                            $_SESSION['edit'] = false;
                            $data = null;
                            echo "NEW POST";
                        }
                    } else {
                        echo "POST";
                    }
                    ?>
                    <br />
                    <br />
                </div>

                <!-- User input for the blog title -->
                <?php
                    if (isset($_GET['value'])) {
                        if (strval($_GET['value']) == "new") {
                            echo "<input type=\"text\" name=\"title\" placeholder=\"Enter Title\">";
                        } else if (strval($_GET['value']) == "edit") {
                            echo "<input type=\"text\" name=\"title\" placeholder=\"Enter Title\" value=\"" . $data->GetTitle() . "\">";
                        }
                }
                ?>
            </div>

            <div id="content-container">

                <!-- user inputs blog content in the textarea -->
                <textarea id="blogcontent" name="blogeditor" class="editblog" style="width: 800px; min-height: 300px; max-height: 300px;">
                    <?php
                        if (isset($_GET['value'])) {
                            if (strval($_GET['value']) == "edit") {
                                echo $data->GetContent();
                            } else {
                                echo "";
                            }
                        }
                        }
                    ?>
                </textarea><br />

                <!-- The type of blog post -->
                <select id="pub-type" name="status">
                    <option value="publish">Publish</option>
                    <option value="Save Draft">Save Draft</option>
                </select>

                <!-- buttons -->
                <button id="blogsubmit" type="submit">Save Post</button>
                <button type="button" onclick="window.location.href='ContentAdmin.php'">Cancel</button>
            </div>
        </form>
    </div>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>