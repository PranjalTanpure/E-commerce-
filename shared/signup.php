<?php

include "connection.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname=$_POST['username'];
$upass=$_POST['password'];
//$utype=$_POST['usertype'];

$sql_status=mysqli_query($conn,"insert into user1(username,password,usertype)values('$uname','$upass','$_POST[usertype]')");

if($sql_status){
    echo"Signup while successfull";

}
else{
    echo"Error while inserting";
    echo mysqli_error($conn);   
}
?>
