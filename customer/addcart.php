<?php
$pid=$_GET["pid"];
session_start();

include "../shared/connection.php";
$status=mysqli_query($conn,"insert into cart(userid,pid) value($_SESSION[userid],$pid)");

if($status){
    echo "Item added to cart!";
}
else{
    echo "Error adding item to cart!";
}


?>