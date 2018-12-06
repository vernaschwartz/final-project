<?php
//admin login info is admin for both username and password
$page_title = "Login";
require_once 'includes/header.php';
?>

<h2>Login</h2>
<form action="login2.php" method="post">
    <table cellspacing="0" cellpadding="3" style="padding:5px;">
        <tr>
            <td style="text-align: right; width: 100px">Username: </td>
            <td><input name="username" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Password: </td>
            <td><input name="password" type="password" size="40" required /></td>
        </tr>
    </table>
    <div>
        <input type="submit" value="Login" />
        <input type="button" value="Cancel" onclick="window.location.href='index.php'" />
    </div>
</form>

<p>Don't have an account yet? Create a new account <a href="add_user1.php">here</a></p>

<?php
require_once 'includes/footer.php';