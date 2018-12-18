<?php session_start();

echo "<html>";
echo "<head>";
echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\">";
echo "</head>";
echo "</html>";

if (isset($_SESSION["loggedin"])) {
    if ($_SESSION["loggedin"] = true) {
        echo "<ul id=\"menu\">";
        echo "<li><a href=\"../Views/BrowseBlogs.php?value=unsorted\">Browse Blogs</a></li>";
        echo "<li>";
        echo "<a href=\"#\">My Blog</a>";
        echo "<ul>";
        echo "<li><a href=\"../Views/EditBlog.php?value=new\">New Post</a></li>";
        echo "<li><a href=\"../Views/ContentAdmin.php\">Blog Administration</a></li>";
        echo "</ul>";
        echo "</li>";

        if ($_SESSION['admin'] == true) {
            echo "<li>";
            echo "<a href=\"../Views/UserAdmin.php\">User Admin</a>";
            echo "</li>";
        }

        echo "<li>";
        echo "<a href=\"#\">Account</a>";
        echo "<ul>";
        echo "<li><a href=\"../Views/Logout.php?value=logout\">Log Out</a></li>";
        echo "</ul>";
        echo "</li>";

        echo "<li>";
        echo "<a href=\"#\">Search</a>";
        echo "<ul>";
        echo "<li>";
        echo "<form class=\"search-stuff\" action=\"../Controllers/SearchController.php\">";
        echo "<input type=\"text\" id=\"searchbox\" name=\"search-box\" placeholder=\"Search...\"><button type=\"submit\"><i class=\"fa fa-search\"></i></button>";
        echo "</form>";
        echo "</li>";
        echo "</ul>";
        echo "</li>";

        echo "</ul>";
    }
} else {
    echo "<ul id=\"menu\">";
    echo "<li><a href=\"../Views/BrowseBlogs.php?value=unsorted\">Browse Blogs</a></li>";
    echo "<li><a href=\"../Views/login.php?value=1\">Login</a></li>";

    echo "<li>";
    echo "<a href=\"#\">Search</a>";
    echo "<ul>";
    echo "<li>";
    echo "<form class=\"search-stuff\" action=\"../Controllers/SearchController.php\">";
    echo "<input type=\"text\" id=\"searchbox\" name=\"search-box\" placeholder=\"Search...\"><button type=\"submit\"><i class=\"fa fa-search\"></i></button>";
    echo "</form>";
    echo "</li>";
    echo "</ul>";
    echo "</li>";

    echo "</ul>";
}

?>
