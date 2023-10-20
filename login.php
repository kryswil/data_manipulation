<?php
//contains code showing how our login system will work
session_start();
include "dbconnect_php";
$uname = $_REQUEST['uname'];
$pwd= $_REQUEST['pwd'];
//conforming our variables are not empty
if(empty($uname)){
    header("Location : index.php?error = USer Name is required!");
    exit();
}
else if(empty($pwd)){
    header("Location : index.php?error = Fill in your password. ");
    exit();
}
$sql = "insert into users values('$uname', '$pwd')";
if($conn -> query($sql) === true)
{
    echo " new records inserted";

}else {
    echo "Error:";
}
$conn->close();
?>