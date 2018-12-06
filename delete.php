<?php 
    $page_title = "Delete a User";
    require('includes/header.php')
?>

<p class="home">Are you sure you want to delete your account?</p>

<form action="delete_user.php">
    <input type="submit" value="Delete"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'manage_accounts.php'" />
</form>

<p class = "home"> Understand that deletion of an account is permanent, and cannot be undone. Be sure that you are 100% sure you wish to delete your account. </p>

<?php 
    require('includes/footer.php')
?>