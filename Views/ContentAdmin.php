<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        ContentAdmin.php
Module Version:     2.0
Module Description: A simple Content Administration page
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
        BLOG ADMINISTRATION
        <br />
        <br />
    </div>

    <form action="../Controllers/ContentController.php" method="POST">
        <div id="content-container">
            <table id="content_table">
                <tr>
                    <th width="15%">Blog ID</th>
                    <th>Title</th>
                    <th width="20%">Action</th>
                    <th width="20%">&nbsp;</th>
                    <th width="20%">&nbsp;</th>
                </tr>
                <!-- PHP CODE TO FILL TABLE -->
                <?php
                $db = new Database("localhost:4406");

                $username = $_SESSION['user']->GetUserName();

                $posts = null;
                $value = null;

                $posts = $db->GetAllPosts($username);

                foreach($posts as $value) {
                    echo "<tr>";
                    echo "<td>" . $value->GetId() . "</td>";
                    echo "<td>" . $value->GetTitle() . "</td>";
                    echo "<td align=\"center\"><button id=\"smallbtn\" name='edit' value='" . $value->GetId() . "'>Edit Post</button></td>";
                    echo "<td align=\"center\"><button id=\"smallbtn\" name='delete' value='" . $value->GetId() . "'>Delete Post</button></td>";
                    echo "<td align=\"center\"><button id=\"smallbtn\" name='view' value='" . $value->GetId() . "'>View Post</button></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </form>
</div>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>


<?php