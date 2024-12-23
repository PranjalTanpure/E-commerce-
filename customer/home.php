
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
  
$sql_result=mysqli_query($conn,"select*from product ");

while($dbrow=mysqli_fetch_assoc($sql_result)){
    
    echo"<div class='pdt-container'>
            <div class='name'>$dbrow[name]</div>
            <div class='price'>$dbrow[price]</div>
            <img src='$dbrow[impath]'>
            <div class='detail'>$dbrow[detail]</div>
            <div class='d-flex justify-content-center gap-4'>

            <a href='addcart.php?pid=$dbrow[pid]'>
    <button class='btn btn-warning'>Add to Cart</button>
</a>
            </div> 
        </div>";
}

?>


