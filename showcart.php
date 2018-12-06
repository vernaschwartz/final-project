<?php
$page_title = "Shopping Cart";
require_once ('includes/header.php');
require_once('includes/database.php');
?>
<h2>My Shopping Cart</h2>

<?php

//if there is no value in cart, tell the user the cart is empty and end script
if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include ('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];


//statement setup
$sql = "SELECT * FROM album_table INNER JOIN genre_table ON genre_table.genre_id = album_table.genre_id WHERE ";
 
//loop to add each id that is a key in the cart array
 foreach (array_keys($cart) as $id){
    $sql .= " album_id='$id' OR";
}
$sql= rtrim($sql, "OR");
//add order by so everything is in alphabetical order
$sql .= "ORDER BY album_table.album_name ASC";

//execute the query
$query = $conn->query($sql);
?>


<table class="albumlist">
    <tr>
        <th class="col5">Album Name</th>
        <th class="col2">Artist</th>
        <th class="col4">Price</th>
        <th class="col4">Qty</th>
        <th class="col4">Total</th>
        <th width="25px"></th>
    </tr>
<?php

//generate each row of the table (similar to album list, but with qty and total price)
while(($row = $query->fetch_assoc())!==NULL){
            $id = $row['album_id'];
            $qty = $cart[$id];
            $total =  $qty * $row['price'];
            echo "<tr>";
            echo "<td>" . "<a href=album_details.php?album_id=" . $row['album_id'] . ">" . $row['album_name'] . "</a>" . "</td>" ;
            echo "<td>" . $row['artist_name'] . "</td>";
            echo "<td>$" . $row['price'] . "</td>";
            echo "<td> " . $qty . "</td>";
            echo "<td>$" . $total . "</td>";
            //link to remove cart so the user can remove the item from their cart.
            echo "<td>". "<a href=remove_cart.php?id=" . $row['album_id'] . "> Remove </a>" . "</td>" ;
            echo "</tr>";
        }

?>

</table>
<br>
<?php 
    //pick a random session variable that the user would only have if logged in
    if(isset($_SESSION['id'])){
    
    //if the user is logged in, show them the checkout button so they can checkout
?>
<div class="bookstore-button">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'album_list.php'" />
</div>
<br><br>

<?php
} else {
    //if user is not logged in, tell them that they must be logged in to check out.
    echo "You must be logged in to access the checkout feature.";
}
include ('includes/footer.php');
