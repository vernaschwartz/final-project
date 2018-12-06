<?php

$page_title = "Add an album";
require_once 'includes/header.php';
require_once('includes/database.php');

//if user is not admin, do not allow them to access feature
if($_SESSION[role] != 1) {
    echo "You must be an admin to access this page";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}
?>

<h2>Add New Album</h2>
<form action="add_album2.php" method="post">
    <table cellspacing="0" cellpadding="3" style="padding:5px;">
        <tr>
            <td style="text-align: right; width: 150px">Album Name: </td>
            <td><input name="album" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Artist: </td>
            <td><input name="artist" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Year Released:</td>
            <td><input name="year" type="number" size="40" min="1900" max="2020" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Number of Songs:</td>
            <td><input name="songs" type="number" size="40" min="1" max="50" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Genre:</td>
            <td>
                <select name="genre">
                    <option value="1">Pop</option>
                    <option value="2">Hip Hop</option>
                    <option value="3">Rock</option>
                    <option value="4">Metal</option>
                    <option value="5">Country</option>
                    <option value="6">Misc.</option>
                </select>
            </td>
        </tr>
        <tr>
            <td style="text-align: right">Price</td>
            <td><input name="price" type="number" size="40" step="0.01" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Image URL: </td>
            <td><input name="image" type="text" size="125" required /></td>
        </tr>
    </table>
    <br>
    <div>
        <input type="submit" value="Add This Album" />
        <input type="button" value="Cancel" onclick="window.location.href='album_list.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';