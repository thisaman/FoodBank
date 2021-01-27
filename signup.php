<?php

$name= $_POST['name'];
$email= $_POST['email'];
$findus=$_POST['findus'];
$news=$_POST['news'];
$message=$_POST['message'];

//Database connection

$conn = new mysqli('localhost', 'root', '', 'user');
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') '
            . $conn->connect_error);
}
else{
   $stmt= $conn->prepare("insert into signup(name,email,findus,news,message) values(?,?,?,?,?)");
    $stmt->bindParam("sssss",$name,$email,$findus,$news,$message);
    $stmt->execute();
    echo "Signed up Successfully";
    $stmt->close();
    $conn->close();
}


?>