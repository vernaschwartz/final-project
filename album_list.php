<?php

//I left in the filtering part of this page because I wasn't sure if you wanted to count it as an advanced feature (it doesn't really matter I have 2 other features already), so I left it in just in case. Just ignore it if you aren't going to count it as an advanced feature


$page_title = "Album List Page";
require 'includes/header.php';
?>


<h2>Our Albums</h2>
<table id="albumlist" class="albumlist">
    <tr>
        <th class="col5">Album Name</th>
        <th class="col2">Artist</th>
        <th class="col3">Genre</th>
        <th class="col4">Price</th>
    </tr>
    <?php
    //link to database.php
    require 'includes/database.php';
  
    $sql = "SELECT * FROM album_table INNER JOIN genre_table ON genre_table.genre_id = album_table.genre_id ORDER BY album_table.album_name ASC";  
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
            echo "<td>" . "<a href=album_filter.php?id=" . $row['genre_id']  . ">" . $row['genre_name'] . "</a>" . "</td>";
            echo "<td>$" . $row['price'] . "</td>";
            echo "</tr>";
        }
    ?>
</table>
<br>

<?php

//if the user is an admin, show the add album button
if($_SESSION['role'] == 1) { ?>

    <form action="add_album1.php">
        <input type="submit" value="Add Album"/>
    </form>

<?php
}
require 'includes/footer.php';
