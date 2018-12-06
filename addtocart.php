<?php
$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<?php

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

//create grab cart values from cart if there already are values, if not, just create a new array
if(isset($_SESSION['cart'])){
    $cart = $_SESSION['cart'];
}else {
    $cart = array();
}

//if album id cannot be found, terminate script.
if (!filter_has_var(INPUT_GET, 'id')){
    $error = "Album id not found. Operation cannot proceed. <br><br>";
    die();
}

//retrieve album id and make sure it is a numeric value.
$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!is_numeric($id)){
    $error = "Invalid album id. Operation cannot proceed. <br><br>";
    die();
}

//if there is already a value, increase it by one, if not, add a new key with a value of 1
if(array_key_exists($id, $cart)){
    $cart[$id]= $cart[$id] +1; 
}else{
    $cart[$id]=1;
}

//update the session variable
$_SESSION['cart']=$cart;

//redirect to the showcart.php page.
header('Location: showcart.php');
?>