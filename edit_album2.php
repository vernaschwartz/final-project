<?php
 
$page_title = "Edit Album";
require_once 'includes/header.php';
require_once('includes/database.php');

//if user is not admin, do not allow them to access feature
if($_SESSION[role] != 1) {
    echo "You must be an admin to access this page";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//if data was not recieved, end the script
if (!filter_has_var(INPUT_POST, 'album') ||
        !filter_has_var(INPUT_POST, 'artist') ||
        !filter_has_var(INPUT_POST, 'year') ||
        !filter_has_var(INPUT_POST, 'songs')||
        !filter_has_var(INPUT_POST, 'genre')||
        !filter_has_var(INPUT_POST, 'price')||
        !filter_has_var(INPUT_POST, 'image') ||
        !filter_has_var(INPUT_POST, 'id')) {   
    echo "There were problems retrieving album information. Please Try Again";
    echo "<a href='create.php'>Return to create page</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//trim and sanitize edited data
    $id = $conn->real_escape_string(trim(filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT)));
    $album = $conn->real_escape_string(trim(filter_input(INPUT_POST, "album", FILTER_SANITIZE_STRING)));
    $artist = $conn->real_escape_string(trim(filter_input(INPUT_POST, "artist", FILTER_SANITIZE_STRING)));
    $year = $conn->real_escape_string(trim(filter_input(INPUT_POST, "year", FILTER_SANITIZE_NUMBER_INT)));
    $songs = $conn->real_escape_string(trim(filter_input(INPUT_POST, "songs", FILTER_SANITIZE_NUMBER_INT)));
    $genre = $conn->real_escape_string(trim(filter_input(INPUT_POST, "genre", FILTER_SANITIZE_NUMBER_INT)));
    $price = $conn->real_escape_string(trim(filter_input(INPUT_POST, "price", FILTER_SANITIZE_STRING)));
    $image = $conn->real_escape_string(trim(filter_input(INPUT_POST, "image", FILTER_SANITIZE_STRING)));
    
    //create SQL statement based on user input
    $sql = "UPDATE album_table SET album_name = '$album', artist_name = '$artist', album_year = '$year', num_songs = '$songs', genre_id = '$genre', price = '$price', image = '$image' WHERE album_table.album_id = '$id'";
    
    
    //Query the database to update the values
    $query = @$conn -> query($sql);
    
    //Handle errors if there is a problem with the query
    if(!$query){
       echo "There were problems creating your account";
       echo $sql;
       require_once 'includes/footer.php';
       $conn->close();
       die();
    }

// close the connection.
$conn->close();

//confirm the action to user, and provide a link to view the edited page.
echo "You have successfully edited the album";
echo "<p><a href='album_details.php?album_id=$id'>Return To Album Page</a></p>";
require_once 'includes/footer.php';
