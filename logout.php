<?php
//start session if one hasn't been started yet
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//unset all the session variables
$_SESSION = array();

//destroy the session
session_destroy();

//create logout page content to inform the user of the logout.
$page_title = "Log Out Successful";

include ('includes/header.php');
?>
<h2>Logout</h2>
<p>You have successfully logged out. Please come visit us again soon!</p>
<?php
include ('includes/footer.php');
