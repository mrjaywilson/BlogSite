<?php
/**
    Project name:       Bloggy Blog
    Project Version:    2.1
    Module Name:        LoginController.php
    Module Version:     2.1
    Module Description: Class that handles the Database functions.
    Developers:         Jay Wilson, Julian Silvestre
    Date:               11.18.2018
 */

// Class Declaration
class Database
{
    // Constructor that accepts the servername of the database
    // to be accessed
    public function __construct($dbservername)
    {
        // Sets the server name
        $this->dbservername = $dbservername;
    }

    // Test the connection to the database
    // Can be removed
    public function Connect()
    {
        $conn = new mysqli("localhost:4406", "root", "root", "bloggyblog");
        //$conn = new mysqli("localhost", "id7632329_jwilson169", "gcu@123", "id7632329_bloggyblog");

        if (mysqli_connect_errno()) {
            return false;
        }

        return $conn;
    }

    // Return the password to verify the password at login
    public function GetPassword($username)
    {
        // setup return variable
        $result = "";

        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement
        if ($statement = $conn->prepare("SELECT password FROM user_table WHERE username=?")) {
            $statement->bind_param("s", $username);
            $statement->execute();
            $statement->bind_result($temp);

            // Get the value from the bind
            $statement->fetch();

            // store value
            $result = $temp;

            // Clean up and close
            $statement->close();
        }

        // Close and clean up the connection
        $conn->close();

        // Return value
        return $result;
    }

    public function DeleteUser($username) {
        // Connect to the database
        $conn = $this->Connect();

        // Delete all users posts first
        if ($statement1 = $conn->prepare("DELETE FROM content_table WHERE username=?")) {

            // supplement string value into prepared statement
            $statement1->bind_param("s", $username);

            // Execute prepared statement
            $statement1->execute();

            // Clean up and Close statement
            $statement1->close();
        }

        // Delete user account info
        if ($statement2 = $conn->prepare("DELETE FROM account_info WHERE username=?")) {

            // supplement string value into prepared statement
            $statement2->bind_param("s", $username);

            // Execute prepared statement
            $statement2->execute();

            // Clean up and Close statement
            $statement2->close();
        }

        // Delete user
        if ($statement3 = $conn->prepare("DELETE FROM user_table WHERE username=?")) {

            // supplement string value into prepared statement
            $statement3->bind_param("s", $username);

            // Execute prepared statement
            $statement3->execute();

            // Clean up and Close statement
            $statement3->close();
        }

        $conn->close();
    }

    // Gets all users for administration
    public function GetAllUsers()
    {
        include '../Models/AdminUser.php';

        $output = array();
        $result = null;

        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("SELECT * FROM user_table")) {

            // Execute statement
            $statement->execute();

            $results = $statement->get_result();



            while ($data = $results->fetch_assoc()) {
                $output[] = new AdminUser(
                    $data['username'],
                    $data['password'],
                    $data['perm']
                );
            }

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();

        return $output;
    }

    // Gets the user profile from the database based on the
    // unique username key, and returns a user object
    public function GetUser($username)
    {
        // Connect to the database
        $conn = $this->Connect();

        $permission = null;

        $result = null;
        $perm = 0;

        if ($statement1 = $conn->prepare("SELECT * FROM user_table WHERE username=?")) {
            // supplement string value into prepared statement
            $statement1->bind_param("s", $username);

            // Execute prepared statement
            $statement1->execute();

            // bind results to variables
            $statement1->bind_result($user_name, $password, $perm);

            // get variable values
            $statement1->fetch();

            $permission = $perm;

            $statement1->close();
        }

        // Create prepared statement
        if ($statement = $conn->prepare("SELECT * FROM account_info WHERE username=?")) {

            // supplement string value into prepared statement
            $statement->bind_param("s", $username);

            // Execute prepared statement
            $statement->execute();

            // bind results to variables
            $statement->bind_result($username, $firstname, $lastname, $email);

            // get variable values
            $statement->fetch();

            // Create a new User object
            $result = new User($firstname, $lastname, $username, '(not currently retrieved, need to setup query for it later)', $email, $permission);

            // Clean up and Close statement
            $statement->close();
        }

        // Close and clean up the connection
        $conn->close();

        // Return user object
        return $result;
    }

    public function UpdateUser($username, $password, $perm, $firstname, $lastname, $email) {
        // Connect to the database
        $conn = $this->Connect();

        // Update account info table first due to restrictions
        // Create prepared statement for account table and insert the new data
        if ($statement1 = $conn->
        prepare("UPDATE account_info SET firstname = ?, lastname = ?, email = ? WHERE username = ?")) {

            // Bind the parameters to variables, execute, and close statement
            $statement1->bind_param("ssss", $firstname, $lastname, $email, $username);
            $statement1->execute();
            $statement1->close();
        }

        // Update user table
        if ($statement2 = $conn->
        prepare("UPDATE user_table SET password = ?, perm = ? WHERE username = ?")) {

            // Bind the parameters to variables
            $statement2->bind_param("sis", $password, $perm, $username);

            // Execute statement
            $statement2->execute();

            // Clean up and close statement
            $statement2->close();
        }

        // Clean up and close connection
        $conn->close();
    }

    // Create a new user in database
    public function CreateNewUser($firstname, $lastname, $username, $password, $email, $perm)
    {
        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("INSERT INTO user_table (username, password, perm) VALUES (?, ?, ?)")) {

            // Bind the parameters to variables
            $statement->bind_param("ssi", $username, $password, $perm);

            // Execute statement
            $statement->execute();

            // Clean up and close statement
            $statement->close();
        }

        // Create prepared statement for account table and insert the new data
        if ($statement = $conn->
        prepare("INSERT INTO account_info (username, firstname, lastname, email) VALUES (?, ?, ?, ?)")) {

            // Bind the parameters to variables, execute, and close statement
            $statement->bind_param("ssss", $username, $firstname, $lastname, $email);
            $statement->execute();
            $statement->close();
        }

        // Clean up and close connection
        $conn->close();

        // Return a new user object
        return new User($firstname, $lastname, $username, $password, $email, $perm);
    }

    public function CreateNewBlog($username, $title, $timestamp, $content, $status) {
        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("INSERT INTO content_table (id, username, title, timestamp, content, status) VALUES (NULL, ?, ?, ?, ?, ?)")) {

            // Bind the parameters to variables
            $statement->bind_param("sssss",$username, $title, $timestamp, $content, $status);

            // Execute statement
            $statement->execute();

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();
    }

    // This is to get all the posts for the user. While this is okay for testing purposes,
    // in a production environment, it would probably be much preferred to load the posts ahead of time
    // and keep them stored, or at the very least use some sort of 'lazy' loading.
    public function GetAllPosts($username) {

        include '../Models/Blog.php';

        $output = array();

        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("SELECT * FROM content_table WHERE username = ?")) {

            // Bind the parameters to variables
            $statement->bind_param("s", $username);

            // Execute statement
            $statement->execute();

            $results = $statement->get_result();

            while ($data = $results->fetch_assoc()) {
                $output[] = new Blog(
                    $data['id'],
                    $data['title'],
                    $data['username'],
                    $data['content'],
                    $data['timestamp'],
                    $data['status']
                );
            }

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();

        return $output;
    }

    // Get one post by Id
    public function GetPostById($username, $postId) {

        include '../Models/Blog.php';

        $blogPost = null;

        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("SELECT * FROM content_table WHERE username = ? AND id = ?")) {

            // Bind the parameters to variables
            $statement->bind_param("si", $username, $postId);

            // Execute statement
            $statement->execute();

            $results = $statement->get_result();

            while ($data = $results->fetch_assoc()) {
                $blogPost = new Blog(
                    $data['id'],
                    $data['title'],
                    $data['username'],
                    $data['content'],
                    $data['timestamp'],
                    $data['status']
                );
            }

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();

        return $blogPost;
    }

    // Update Blog Entry
    public function UpdateBlog($title, $content, $status, $id) {
        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("UPDATE content_table SET title = ?, content = ?, status = ? WHERE id = ?")) {

            // Bind the parameters to variables
            $statement->bind_param("sssi",$title, $content, $status, $id);

            // Execute statement
            $statement->execute();

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();
    }

    public function DeletePost($id) {
        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement
        if ($statement = $conn->prepare("DELETE FROM content_table WHERE id=?")) {

            // supplement string value into prepared statement
            $statement->bind_param("i", $id);

            // Execute prepared statement
            $statement->execute();

            // Clean up and Close statement
            $statement->close();
        }
    }

    // This is to get all the posts for the user with filter
    public function GetAllPostsWithFilters($username, $author, $content) {

        include '../Models/Blog.php';

        $output = array();

        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("SELECT * FROM content_table WHERE username = ?")) {

            // Bind the parameters to variables
            $statement->bind_param("s", $username);

            // Execute statement
            $statement->execute();

            $results = $statement->get_result();

            while ($data = $results->fetch_assoc()) {
                $output[] = new Blog(
                    $data['id'],
                    $data['title'],
                    $data['username'],
                    $data['content'],
                    $data['timestamp'],
                    $data['status']
                );
            }

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();

        return $output;
    }

    // Filter posts by author & content
    public function GetAllPostsToBrowse($author, $content) {

        include '../Models/Blog.php';

        $output = array();

        // Connect to the database
        $conn = $this->Connect();

        if ($author == "" && $content == "") {
            $sql = "SELECT * FROM content_table ORDER BY 'timestamp' DESC";
        } else if ($author != "" && $content == "") {
            $sql = "SELECT * FROM content_table WHERE username='$author' ORDER BY 'timestamp' DESC";
        } else if ($author == "" && $content != "") {
            $sql = "SELECT * FROM content_table WHERE content LIKE '%$content%' ORDER BY 'timestamp' DESC";
        } else if ($author != "" && $content != "") {
            $sql = "SELECT * FROM content_table WHERE username='$author' AND content LIKE '%$content%' ORDER BY 'timestamp' DESC";
        }

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->prepare($sql)) {

            // Execute statement
            $statement->execute();

            $results = $statement->get_result();

            while ($data = $results->fetch_assoc()) {
                $output[] = new Blog(
                    $data['id'],
                    $data['title'],
                    $data['username'],
                    $data['content'],
                    $data['timestamp'],
                    $data['status']
                );
            }

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();

        return $output;
    }

    // Search all content and titles
    public function SearchAllPosts($search) {

        include '../Models/Blog.php';

        $output = array();

        // Connect to the database
        $conn = $this->Connect();

        if ($search == "") {
            $sql = "SELECT * FROM content_table ORDER BY 'timestamp' DESC";
        } else {
            $sql = "SELECT * FROM content_table WHERE title LIKE '%$search%' OR content LIKE '%$search%' ORDER BY 'timestamp' DESC";
        }

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->prepare($sql)) {

            // Execute statement
            $statement->execute();

            $results = $statement->get_result();

            while ($data = $results->fetch_assoc()) {
                $output[] = new Blog(
                    $data['id'],
                    $data['title'],
                    $data['username'],
                    $data['content'],
                    $data['timestamp'],
                    $data['status']
                );
            }

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();

        return $output;
    }

    public function AddNewComment($blog_id, $author_id, $comment, $rating) {
        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for comment table
        if ($statement = $conn->
        prepare("INSERT INTO comment_table (blog_id, author_id, comment_content, rating) VALUES (?, ?, ?, ?)")) {

            // Bind the parameters to variables
            $statement->bind_param("issi", $blog_id, $author_id, $comment, $rating);

            // Execute statement
            $statement->execute();

            // Clean up and close statement
            $statement->close();
        }

        // Clean up and close connection
        $conn->close();
    }

    public function GetAllCommentsForPost($id) {

        include '../Models/Comment.php';

        $output = array();

        // Connect to the database
        $conn = $this->Connect();

        // Create prepared statement for user table and insert the new data
        if ($statement = $conn->
        prepare("SELECT * FROM comment_table WHERE blog_id = ?")) {

            // Bind the parameters to variables
            $statement->bind_param("i", $id);

            // Execute statement
            $statement->execute();

            $results = $statement->get_result();

            while ($data = $results->fetch_assoc()) {
                $output[] = new Comment(
                    $data['blog_id'],
                    $data['author_id'],
                    $data['comment_content'],
                    $data['rating']
                );
            }

            // Clean up and close statement
            $statement->close();
        }

        $conn->close();

        return $output;
    }
}