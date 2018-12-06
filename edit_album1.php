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

//get id from details page
$edit_id = trim(filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT));

//create and exectue query
$sql = "SELECT * FROM album_table WHERE album_table.album_id = $edit_id ";
$query = @$conn->query($sql);

//handle errors if query doesn't work
if(!$query){
    echo "There were problems retrieving user information. Please Try Again";
    echo "<a href='create.php'>Return to edit page</a>";
    require_once 'includes/update.php';
    $conn->close();
    die();
}

//get all information of album and put it into a form to be edited
$row = $query->fetch_assoc();
?>

<h2>Edit Album: <?= $row['album_name']  ?></h2>
<form action="edit_album2.php" method="post">
    <table cellspacing="0" cellpadding="3" style="padding:5px;">
        <tr>
            <td style="text-align: right; width: 150px">Album Name: </td>
            <td><input name="album" type="text" size="40" value="<?= $row['album_name'] ?>" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Artist: </td>
            <td><input name="artist" type="text" size="40" value="<?= $row['artist_name'] ?>" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Year Released:</td>
            <td><input name="year" type="number" size="40" value="<?= $row['album_year'] ?>" min="1900" max="2020" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Number of Songs:</td>
            <td><input name="songs" type="number" size="40" value="<?= $row['num_songs'] ?>" min="1" max="30" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Genre:</td>
            <td>
                <select name="genre">
                    <option value="1" <?php if ($row['genre_id'] == "1") echo "selected='selected'";?>>Pop</option>
                    <option value="2" <?php if ($row['genre_id'] == "2") echo "selected='selected'";?>>Hip Hop</option>
                    <option value="3" <?php if ($row['genre_id'] == "3") echo "selected='selected'";?>>Rock</option>
                    <option value="4" <?php if ($row['genre_id'] == "4") echo "selected='selected'";?>>Metal</option>
                    <option value="5" <?php if ($row['genre_id'] == "5") echo "selected='selected'";?>>Country</option>
                    <option value="6" <?php if ($row['genre_id'] == "6") echo "selected='selected'";?>>Misc.</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">Price</td>
            <td><input name="price" type="number" size="40" value="<?= $row['price'] ?>" step="0.01" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Image URL: </td>
            <td><input name="image" type="text" size="125" value="<?= $row['image'] ?>" required /></td>
        </tr>
    </table>
    <br>
    <div>
        <input type="submit" value="Edit The Album" />
        <input type="button" value="Cancel" onclick="window.location.href='album_list.php'" />
    </div>
    <input type="number" name="id" value="<?= $edit_id ?>" hidden/>
</form>

<?php
require_once 'includes/footer.php';