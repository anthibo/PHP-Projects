<?php
function Createdb()
{
    $servername = "localhost:3307";
    $username = "root";
    $password = "";
    $dbname = "bookstore";
    //create connection
    $con = mysqli_connect($servername, $username, $password);
    //check connection
    if (!$con) {
        die("Connection Failed: " . mysqli_connect_error());
    }
    //create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if (mysqli_query($con, $sql)) {
        $con = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "CREATE TABLE IF NOT EXISTS`books`( `id` INT NOT NULL AUTO_INCREMENT, `book_name` VARCHAR(25) NOT NULL, `book_publisher` VARCHAR(20), `book_price` FLOAT , PRIMARY KEY(`id`) );

             ";
        if (mysqli_query($con, $sql)) {
            return $con;
        } else {
            echo "CANNOT CREATE TABLE..!" . mysqli_error($con);
        }


    } else {
        echo "Error while created database" . mysqli_error($con);
    }
}