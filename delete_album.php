<?php

$page_title = "Delete User";
require_once 'includes/header.php';
require_once('includes/database.php');

//if user is not admin, do not allow them to access feature
if($_SESSION[role] != 1) {
    echo "You must be an admin to access this page";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//if it cant recieve the id, send an error
if (!filter_has_var(INPUT_GET, 'id')) {
    echo "Deletion cannot continue since there were problems retrieving album id";
    include ('includes/footer.php');
    exit;
}


//trim and sanitize input
$delete_id = trim(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT));


//Construct SQL statement
$sql = "DELETE FROM album_table WHERE album_table.album_id = $delete_id ";

//query database
$query = @$conn->query($sql);

//If the query did not work, tell the user and end the script.
if (!$query) {
    echo "There were problems deleting the album";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//close database connection
$conn->close();

//confirm album has been deleted.
echo "<br> You have successfully deleted the album. <br>";
echo "<p><a href='album_list.php'>Return to Album List</a></p>";

require_once 'includes/footer.php';
