<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        UserAdmin.php
Module Version:     2.0
Module Description: Handles the user administration page.
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
        USER ADMINISTRATION
        <br />
        <br />
    </div>

    <form action="../Controllers/AdminController.php" method="POST">
        <div id="content-container">
            <!--            <button id="button-general" name="new" class="newblog" value="Create New Blog">Create New Post</button>
            -->            <table id="content_table">
                <tr>
                    <th width="15%">Username</th>
                    <th width="20%">Permission Level</th>
                    <th width="20%">Action</th>
                    <th width="20%">&nbsp;</th>
                </tr>
                <!-- PHP CODE TO FILL TABLE -->
                <?php
                $db = new Database("localhost");

                $user = $_SESSION['user'];

                if ($_SESSION['user']->GetPermission() == 1) {
                    $users = null;
                    $value = null;

                    $posts = $db->GetAllUsers();

                    foreach($posts as $value) {
                        echo "<tr>";
                        echo "<td>" . $value->GetUserName() . "</td>";
                        echo "<td>" . $value->GetPermission() . "</td>";
                        echo "<td align=\"center\"><button id=\"smallbtn\" name='edit' value='" . $value->GetUserName() . "'>Edit</button></td>";
                        echo "<td align=\"center\"><button id=\"smallbtn\" name='delete' value='" . $value->GetUserName() . "'>Delete</button></td>";
                        echo "</tr>";
                    }
                } else {
                    // YOU DO NOT HAVE PERMISSION TO DO THAT. REDIRECTING.
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