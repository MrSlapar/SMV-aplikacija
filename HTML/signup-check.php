<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$result1 = $conn->query("SELECT id FROM Profesorji WHERE ime = '" . $_POST["name"] . "' AND priimek = '" . $_POST["surname"] . "'");
$result2 = $conn->query("SELECT id FROM Dijaki WHERE ime = '" . $_POST["name"] . "' AND priimek = '" . $_POST["surname"] . "'");
if(($result1 !== false && $result1->num_rows > 0) || ($result2 !== false && $result2->num_rows > 0)){	
	$_SESSION["signupMessage"] = "That name and surname combination already exists, please create a new one.";
	header("Location: signup.php");
	exit();
}

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
	$_SESSION["signupMessage"] = "You seem to have left out some information.";
	header("Location: signup.php");	
	exit();
}
?>