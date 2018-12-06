<?php
$page_title = "Delete User";
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once('includes/database.php');

//set delete id as the session id of the user
$delete_id = $_SESSION['id'];

$sql = "SELECT * FROM user_table WHERE user_table.user_id = $delete_id ";
$query = @$conn->query($sql);

$row = $query->fetch_assoc();

//if user is an admin, don't let them delete their account, becuase we don't want admin accounts accidentally deleted.
if($row['is_admin'] == 1) {
    require_once 'includes/header.php';
    echo "This account is an admin account. Admin Accounts cannot be deleted <br> <a href='manage_accounts.php'>Return to account management page</a>  ";
    include ('includes/footer.php');
    exit;
}

//Construct SQL statement
$sql = "DELETE FROM user_table WHERE user_table.user_id = $delete_id ";

//query database to delete book
$query = @$conn->query($sql);

//If there are errors, tell the user and end program
if (!$query) {
    require_once 'includes/header.php';
    echo "There were problems deleting the user account";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//close database connection
$conn->close();

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//remove session variables to basically log the user out.
$_SESSION = array();
session_destroy();

//give user a confirmation message.
require 'includes/header.php';
echo "<br> You have successfully deleted your account. <br> We are sorry to see you leave. <br>";
require_once 'includes/footer.php';
