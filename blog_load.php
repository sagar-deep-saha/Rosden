<?php
session_start();
if($_SESSION["new_session"]==false){
    header('location:log.php');
    exit;
}

$df = $_SESSION['username'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    $server = "localhost";
    $user = "root";
    $port = "3306";
    $password = "";
    $database = "rosden";

    $connection = mysqli_connect($server,$user,$password,$database,$port);
    if($connection == false){
        die(mysqli_connect_error());
    }

    // require "connector.php";

    $blog = $_POST['blog'];
    $type = $_POST['title'];



    $sql_query = "INSERT INTO `blog`(`writer`,`blog`,`type`) VALUES ('$df','$blog','$type');";
    $last_query= mysqli_query($connection,$sql_query);

    header('location:blog.php');
}


?>