<?php
 
$page_title = "Account Edits";
require_once 'includes/header.php';
require_once('includes/database.php');

//if form data is not recieved, tell user and end script
if (!filter_has_var(INPUT_POST, 'username') ||
        !filter_has_var(INPUT_POST, 'password') ||
        !filter_has_var(INPUT_POST, 'name')) {   
    echo "There were problems retrieving user information. Please Try Again";
    echo "<a href='create.php'>Return to create page</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//get username, password and name from form data and assign id from session variable
    $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING)));
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
    $name = $conn->real_escape_string(trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
    $id = $_SESSION['id'];
    
    //construct SQL statement
    $sql = "UPDATE user_table SET username = '$username', password = '$password', real_name = '$name' WHERE user_table.user_id = '$id'";
    
    //Query the database
    $query = @$conn -> query($sql);
    
    //Handle errors
    if(!$query){
       echo "There were problems creating your account";
       echo $sql;
       require_once 'includes/footer.php';
       $conn->close();
       die();
    }

// close the connection.
$conn->close();

//give user confirmation of successful edit
echo "You have successfully edited your account";
require_once 'includes/footer.php';
