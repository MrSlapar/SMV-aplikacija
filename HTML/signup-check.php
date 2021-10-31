<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

if($_POST["name"] != "" && $_POST["surname"] != "" && $_POST["password"] != ""){
	$result = $conn->query("
		INSERT INTO Dijaki(ime, priimek, password) VALUES
		(" .
			"'" . $_POST["name"] . "', " .
			"'" . $_POST["surname"] . "', " .
			"'" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "'
		);"
	);
	
	$_SESSION["id"] = $conn->insert_id;
	$_SESSION["type"] = "student";
	
	header("Location: index.php");
	exit();
}else{
	header("Location: signup.php");	
	exit();
}
?>