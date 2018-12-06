<?php
$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<?php

//if album id cannot be found, terminate script.
if (!filter_has_var(INPUT_GET, 'id')){
    $error = "Album id not found. Operation cannot proceed. <br><br>";
    require_once ('includes/footer.php');
    die();
}

//retrieve album id and make sure it is a numeric value.
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!is_numeric($id)){
    $error = "Invalid album id. Operation cannot proceed. <br><br>";
    require_once ('includes/footer.php');
    die();
}

//if a value exists at that array key, remove it so that it no longer shows in the cart
if(array_key_exists($id, $cart)){
    unset($cart[$id]); 
}


//update the session variable
$_SESSION['cart']=$cart;

header('Location: showcart.php');
?>