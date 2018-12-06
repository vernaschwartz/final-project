<?php


$page_title = "Artist Filter Page";
require 'includes/header.php';
?>

<h2>Our Albums</h2>
<table id="albumlist" class="albumlist">
    <tr>
        <th>Album Name</th>
        <th class="col2">Artist</th>
        <th class="col3">Genre</th>
        <th class="col4">Price</th>
    </tr>
    <?php
    //link to database.php
    require 'includes/database.php';
    
    if (!filter_has_var(INPUT_GET, 'id')){
        $error = "Genre id not found. Operation cannot proceed. <br><br>";
        die();
    }
    $id = $conn->real_escape_string(trim(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT)));

    $sql = "SELECT * FROM album_table INNER JOIN genre_table ON genre_table.genre_id = album_table.genre_id WHERE album_table.genre_id=$id";  
  
    //Query the database
    $query = @$conn->query($sql);
    //Handle Errors
    if (!$query) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Selection failed with: ($errno) $errmsg<br/>\n";
        $conn->close();
        require_once ('includes/footer.php');
        exit;
    } 
        //Get an array of row of table each time through loop
        while (($row = $query->fetch_assoc())!==NULL) {
            echo "<tr>";
            echo "<td>" . "<a href=album_details.php?album_id=" . $row['album_id'] . ">" . $row['album_name'] . "</a>" . "</td>" ;
            //print author
            echo "<td>" . $row['artist_name'] . "</td>";
            //print category
            echo "<td>" . $row['genre_name'] . "</td>";
            echo "<td>$" . $row['price'] . "</td>";
            echo "</tr>";
        }
    ?>
</table>