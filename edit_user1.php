<?php

$page_title = "Edit a new user account";
require_once 'includes/header.php';
require_once('includes/database.php');

//get user id from session variables
$edit_id = $_SESSION['id'];

//get user information to be used in editing
$sql = "SELECT * FROM user_table WHERE user_table.user_id = $edit_id ";
$query = @$conn->query($sql);

//handle errors
if(!$query){
    echo "There were problems retrieving user information. Please Try Again";
    echo "<a href='manage_accounts.php'>Return to management page</a>";
    $conn->close();
    die();
}

$row = $query->fetch_assoc();

//create a form like create user, but with current user information already added
?>
<h2>Edit Your Account Information</h2>
<form action="edit_user2.php" method="post">
    <table cellspacing="0" cellpadding="3" style="padding:5px;">
        <tr>
            <td style="text-align: right; width: 100px">Username: </td>
            <td><input name="username" type="text" size="40" value="<?= $row['username'] ?>" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Password </td>
            <td><input name="password" type="text" size="40" value="<?= $row['password'] ?>" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">First Name:</td>
            <td><input name="name" type="text" size="40" value="<?= $row['real_name'] ?>" required /></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="Edit Account" />
        <input type="button" value="Cancel" onclick="window.location.href='manage_accounts.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';