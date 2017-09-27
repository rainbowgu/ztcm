<?php


$conn = mysqli_connect('127.0.0.1', "root", "ztcm", "easybuy");
if ($conn->connect_error) {
	die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn,"set names utf-8");




?>