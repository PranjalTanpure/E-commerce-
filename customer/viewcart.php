
<html>
    <header>
        <style>
            .pdt-container{
                background-color: bisque;
                display: inline-block;
                margin:10px;
                padding:10px;
                width:300px;
                height:fit-content;
                vertical-align: top;
            }
            img{
                width:100%; 
                height:200px;
            }
            .name{
                font-size:24;
                font-weight:bold;
            }
            .price{
                font-size:20px;
                color: crimson;
            }
            .price::after{
                content:" Rs";
                font-size: 12px;
            }
        </style>    
    </header>
</html>

<?php
include "../shared/connection.php";
include "menu.html";
session_start();

if(!isset($_SESSION["login_status"])){
    echo"Login is Skipped";
    die;
}
if($_SESSION["login_status"]==false){
    echo "Unauthorized Attempt"; 
    die;
}
if($_SESSION["usertype"]!="Customer"){
    echo "Forbidden Access";
    die;
}
  
$sql_result=mysqli_query($conn,"select*from cart join product on cart.pid=product.pid where cart.userid=$_SESSION[userid]");
$total=0;
while($dbrow=mysqli_fetch_assoc($sql_result)){
    $total+=$dbrow['price'];  
    
    echo"<div class='pdt-container'>
            <div class='name'>$dbrow[name]</div>
            <div class='price'>$dbrow[price]</div>
            <img src='$dbrow[impath]'>
            <div class='detail'>$dbrow[detail]</div>
            <div class='d-flex justify-content-center gap-4'>

            <a href='deletecart.php?cartid=$dbrow[cartid]'>
    <button class='btn btn-danger'>Remove from Cart</button>
</a>
            </div> 
        </div>";
}
echo"<div class ='display-6'>
<button class =' btn btn-primary'>Place Order $total Rs</button>
</div>"
?>


