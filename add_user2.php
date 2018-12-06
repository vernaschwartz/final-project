<?php
 
$page_title = "User Creation";
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once('includes/database.php');

//if the script did not received post data, display an error message and then terminite the script immediately
if (!filter_has_var(INPUT_POST, 'username') ||
        !filter_has_var(INPUT_POST, 'password') ||
        !filter_has_var(INPUT_POST, 'name')) {   
    require_once 'includes/header.php';
    echo "There were problems retrieving user information. Please Try Again";
    echo "<a href='create.php'>Return to create page</a>";
    require_once 'includes/footer.php';
    $conn->close();
    die();
}

//sanitize data for insertion into database
    $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING)));
    $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
    $name = $conn->real_escape_string(trim(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING)));
    
    $sql = "INSERT INTO user_table VALUES (NULL, '$username', '$password', '$name', '2')";
    
    
    //Query the database to add the values
    $query = @$conn -> query($sql);
    
    //Handle errors if data is not inserted into database
    if(!$query){
        require_once 'includes/header.php';
       echo "There were problems creating your account";
       echo $sql;
       require_once 'includes/footer.php';
       $conn->close();
       die();
    }

//determine id of user so it can be added as a session variable
$id = $conn->insert_id;

//create session variables and welcome the user
$_SESSION['username'] = $username;
$_SESSION['role'] = 2;
$_SESSION['name'] = $name;
$_SESSION['id'] = $id;
require_once 'includes/header.php';
echo "<br>Welcome, $name! You have successfully registered for our website.";

$conn->close();
require_once 'includes/footer.php';
