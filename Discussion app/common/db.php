<?php
$host="localhost";
$username="root";
$password=null;
$database="discuss";
// Now we can use both PDO or MY SQLI ..
$conn=new mysqli($host,$username,$password,$database);
if($conn->connect_error){
    die("DB is Not Connected ". $conn->connect_error);   
}


?>