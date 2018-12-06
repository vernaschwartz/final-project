<?php
 
$page_title = "Add Album";
require_once 'includes/header.php';
require_once('includes/database.php');

//if user is not admin, do not allow them to access feature
if($_SESSION[role] != 1) {
    echo "You must be an admin to access this page";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//send error and end code if page did not recieve a post value
if (!filter_has_var(INPUT_POST, 'album') ||
        !filter_has_var(INPUT_POST, 'artist') ||
        !filter_has_var(INPUT_POST, 'year') ||
        !filter_has_var(INPUT_POST, 'songs')||
        !filter_has_var(INPUT_POST, 'genre')||
        !filter_has_var(INPUT_POST, 'price')||
        !filter_has_var(INPUT_POST, 'image')) {   
    echo "There were problems retrieving album information. Please Try Again";
    echo "<a href='create.php'>Return to create page</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//Sanitize values so they are safe to put into SQL database
    $album = $conn->real_escape_string(trim(filter_input(INPUT_POST, "album", FILTER_SANITIZE_STRING)));
    $artist = $conn->real_escape_string(trim(filter_input(INPUT_POST, "artist", FILTER_SANITIZE_STRING)));
    $year = $conn->real_escape_string(trim(filter_input(INPUT_POST, "year", FILTER_SANITIZE_NUMBER_INT)));
    $songs = $conn->real_escape_string(trim(filter_input(INPUT_POST, "songs", FILTER_SANITIZE_NUMBER_INT)));
    $genre = $conn->real_escape_string(trim(filter_input(INPUT_POST, "genre", FILTER_SANITIZE_NUMBER_INT)));
    $price = $conn->real_escape_string(trim(filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING)));
    $image = $conn->real_escape_string(trim(filter_input(INPUT_POST, "image", FILTER_SANITIZE_STRING)));
    
    
    $sql = "INSERT INTO album_table VALUES (NULL, '$album', '$artist', '$year', '$songs', '$genre', '$price', '$image')";
    
    
    //Query the database to add the values
    $query = @$conn -> query($sql);
    
    //Handle errors if data is not inserted into database
    if(!$query){
       echo "There were problems creating your account";
       echo $sql;
       require_once 'includes/footer.php';
       $conn->close();
       die();
    }

$id = $conn->insert_id;

// close the database connection.
$conn->close();

//tell user that addition was successful, and allow them to look at newly added album page
echo "Album added to database succesfully.";
echo "<p><a href='album_details.php?album_id=$id'>To Album Page</a></p>";

require_once 'includes/footer.php';
