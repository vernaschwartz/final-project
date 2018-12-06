<?php

//create session if none started (usually done in header, but so header is updated with login, I waited until adding session variables to add header.php)
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
$page_title = "Login";
require_once('includes/database.php');

//if username and password were not recieved, tell user and stop script
if (!filter_has_var(INPUT_POST, 'username') ||
        !filter_has_var(INPUT_POST, 'password')) { 
    require_once 'includes/header.php';
    echo "There were problems retrieving login information. Please Try Again";
    echo "<a href='add_user1.php'> Return to create page</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

    //trim and sanitize username and password entries for query
    $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING)));
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
    
    //construct statement
    $sql = "SELECT * FROM user_table WHERE username = '$username' AND password = '$password' ";
    
    //Query the database
    $query = @$conn -> query($sql);
    
    //Handle errors
    if(!$query){
        require_once 'includes/header.php';
       echo "There were problems accessing the login database";
       require_once 'includes/footer.php';
       $conn->close();
       die();
    }

//if there is no entry in database with that username and password, tell user that login info is incorrect
if($query->num_rows == 0) {
    require_once 'includes/header.php';
    echo "Cannot Login. Username or password is incorrect";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$row = $query->fetch_assoc();

//set session variables
$_SESSION['username'] = $username;
$_SESSION['role'] = $row['is_admin'];
$_SESSION['name'] = $row['real_name'];
$_SESSION['id'] = $row['user_id'];

//include header now, so that logout shows in nav bar instead of login
require_once 'includes/header.php';

//inform user that login was successful, and welcome them back
?>
<h2>Log In Successful</h2>
<p>Welcome back, <?= $_SESSION['name'] ?>! You have successfully logged in.</p>
<?php

//if user is an admin, let the user know that
if ($_SESSION['role'] == 1) {
    echo "<br> Your account is an admin account. You will be allowed to edit the album data of the site now.";
}

// close the connection.
$conn->close();

require_once 'includes/footer.php';