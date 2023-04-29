<?php 
 $servername = "localhost";
 $username = "root";
 $password = "";

 //create connection
 $conn = mysqli_connect($servername, $username, $password);
//chek connection
 if (!$conn) {
 	die("Connection failed: " . mysqli_connect_error());
 }

 //create database
 $sql = "CREATE DATABASE db_buku_tamu";
 if (mysqli_query($conn, $sql)) {
 	echo "Database created successfully";
 } else{
 	echo "Error Creating database: " . mysqli_error($conn);
 }
 mysqli_close($conn);
 ?>