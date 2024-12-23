
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
include "menu.html";
include "../shared/connection.php";

session_start(); 
$sql_result=mysqli_query($conn,"select*from product where owner=$_SESSION[userid]");

while($dbrow=mysqli_fetch_assoc($sql_result)){
    
    echo"<div class='pdt-container'>
            <div class='name'>$dbrow[name]</div>
            <div class='price'>$dbrow[price]</div>
            <img src='$dbrow[impath]'>
            <div class='detail'>$dbrow[detail]</div>
            <div class='d-flex justify-content-center gap-4'>
               <button type='button' class='btn btn-primary btn-sm'>Edit</button>
               <button type='button' class='btn btn-danger  btn-sm'>Remove</button>
            </div> 
        </div>";
}

?>