<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$path = "../files/" . $_POST["name"] . "/" . $_FILES["file"]["name"];
echo $path . "<br>";
echo $_FILES["file"]["name"] . "<br>" . $_POST["assignment"] . "<br>" . $_POST["filename"] . "<br>" . $_POST["name"];

if(file_exists($path)) echo "The file already exists.";
move_uploaded_file($_FILES["file"]["tmp_name"], $path);
?>