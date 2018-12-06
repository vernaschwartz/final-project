<?php

$page_title = "Create a new user account";
require_once 'includes/header.php';
?>

<h2>Create Your Account</h2>
<form action="add_user2.php" method="post">
    <table cellspacing="0" cellpadding="3" style="padding:5px;">
        <tr>
            <td style="text-align: right; width: 100px">Username: </td>
            <td><input name="username" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Password: </td>
            <td><input name="password" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">First Name:</td>
            <td><input name="name" type="text" size="40" required /></td>
        </tr>
    </table>
    <p>Note: User account cannot be made admin during account creation. To get an admin account, contact the webmaster</p>
    <div>
        <input type="submit" value="Create Account" />
        <input type="button" value="Cancel" onclick="window.location.href='manage_user.php'" />
    </div>
</form>

<?php
require_once 'includes/footer.php';