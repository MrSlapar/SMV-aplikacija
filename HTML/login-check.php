<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$result = $conn->query("SELECT id, password FROM Profesorji WHERE ime = '" . $_POST["name"] . "' AND priimek = '" . $_POST["surname"] . "'");
if($result !== false && $result->num_rows > 0){
	$row = $result->fetch_assoc();
	if(password_verify($_POST["password"], $row["password"])){
		$_SESSION["id"] = $row["id"];
		$_SESSION["type"] = "professor";
		header("Location: index.php");
		exit();
	}
}

$result = $conn->query("SELECT id, password FROM Dijaki WHERE ime = '" . $_POST["name"] . "' AND priimek = '" . $_POST["surname"] . "'");
if($result !== false && $result->num_rows > 0){
	$row = $result->fetch_assoc();
	if(password_verify($_POST["password"], $row["password"])){
		$_SESSION["id"] = $row["id"];
		$_SESSION["type"] = "student";
		header("Location: index.php");
		exit();
	}
}

$_SESSION["loginMessage"] = "The information you've entered is incorrect.";
header("Location: login.php");
exit();
?>