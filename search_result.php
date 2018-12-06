<?php
$page_title = "Search Results";
require('includes/header.php');
require('includes/database.php');

if (!filter_has_var(INPUT_POST, "query")) {
    echo "There were problems retrieving search data. Please Try Again";
    echo "<a href='search.php'>Return to search page</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

$search = $conn->real_escape_string(trim(filter_input(INPUT_POST, "query", FILTER_SANITIZE_STRING)));

$terms = explode(" ", $search);

?>
<h2>Albums Names Containing "<?= $search ?>"</h2>
<br>
<form action="search_result.php" method="POST">
        <input type="text" name="query" value="<?= $search ?>" />
        <input type="submit" value="Search" />
    </form>
    <br>
<?php 
    
    $sql = "SELECT * FROM album_table INNER JOIN genre_table ON genre_table.genre_id = album_table.genre_id WHERE"; 

    foreach($terms as $term){
        $sql .= " album_table.album_name LIKE '%$term%' AND";
        
    }
    $sql= rtrim($sql, "AND");
    $sql .= "ORDER BY album_table.album_name ASC";
    $query = @$conn->query($sql); 


    if (!$query) {
        $errno = $conn->errno;
        $errmsg = $conn->error;
        echo "Selection failed with: ($errno) $errmsg<br/>\n";
        $conn->close();
        require_once ('includes/footer.php');
        exit;
    }
    
    if ($query->num_rows == 0) {
        echo "<b>Your search '$search' did not return any results</b>";
        $conn->close();
        require_once ('includes/footer.php');
        exit;
    }

?>
    <table id="albumlist" class="albumlist">
        <tr>
            <th>Album Name</th>
            <th class="col2">Artist</th>
            <th class="col3">Genre</th>
            <th class="col4">Price</th>
        </tr>
        
<?php
    
while(($row = $query->fetch_assoc())!==NULL){
            echo "<tr>";
            echo "<td>" . "<a href=album_details.php?album_id=" . $row['album_id'] . ">" . $row['album_name'] . "</a>" . "</td>" ;
            //print author
            echo "<td>" . $row['artist_name'] . "</td>";
            //print category
            echo "<td>" . $row['genre_name'] . "</td>";
            echo "<td>$" . $row['price'] . "</td>";
            echo "</tr>";
        }

    echo "</table>";
?>


<?php

$query->close();

$conn->close();

require('includes/footer.php');
?>
