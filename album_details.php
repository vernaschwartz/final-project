<?php

$page_title = "Album Details";
require_once ('includes/header.php');
//link to database.php
require ('includes/database.php');

//Make sure album_id variable is set, then sanitize it
if (!filter_has_var(INPUT_GET, 'album_id')){
    $error = "Album id not found. Operation cannot proceed. <br><br>";
    die();
}
$id = $conn->real_escape_string(trim(filter_input(INPUT_GET, "album_id", FILTER_SANITIZE_NUMBER_INT)));


//Query the books table, and return rows where the id matches that of the one in the url
$sql = "SELECT * FROM album_table INNER JOIN genre_table ON genre_table.genre_id = album_table.genre_id WHERE album_table.album_id=$id";
$query = @$conn->query($sql);

//Error handling
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    require_once ('includes/footer.php');
    exit;
}
    //get array of query above
    $row = $query->fetch_assoc();
    ?>

    <h2>Album Details</h2>
    <table id="albumdetails" class="albumdetails">
        <tr>
             <td class="col1">
                 <br>
                <image src="<?= $row['image'] ?>" width="160px" height="160px" alt="<?= $row['album_name'] ?> Cover">
            </td> 
            <td class="col2">
                <h3>Album Name:</h3>
                <h3>Artist:</h3>
                <h3>Genre:</h3>
                <h3>Number of Songs:</h3>
                <h3>Year Released:</h3>
                <h3>Price:</h3>
            </td>
            <td class="col3">
                <h3><?= $row['album_name'] ?></h3>
                <h3><?= $row['artist_name'] ?></h3>
                <h3><?= $row['genre_name'] ?></h3>
                <h3><?= $row['num_songs'] ?></h3>
                <h3><?= $row['album_year'] ?></h3>
                <h3>$<?= $row['price'] ?></h3>
            </td>
            <td class="col4">
                <br>
                <br>
                <a href="addtocart.php?id=<?php echo $row['album_id']?>">
                    <img src="img/addtocart_button.jpg" height = "100x" width  = "250px"/>
                </a>
            </td>
        </tr>
    </table>
<?php if($_SESSION['role'] == 1) { ?>    
    <form action="delete_album.php">
        <input type="text" name="id" value="<?= $id ?>" hidden />
        <input type="submit" value="Delete Album"/>
    </form>
    <br>

    <form action="edit_album1.php">
        <input type="text" name="id" value="<?= $id ?>" hidden />
        <input type="submit" value="Edit Album"/>
    </form>
    <?php
}
require_once ('includes/footer.php');