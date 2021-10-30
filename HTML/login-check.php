<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$result = $conn->query("SELECT password FROM Dijaki WHERE ime = '" . $_POST["name"] . "' AND priimek = '" . $_POST["surname"] . "'");
if($result !== false && $result->num_rows > 0){
	$row = $result->fetch_assoc();
	if(password_verify($_POST["password"], $row["password"])){
		header("Location: index.php?id=" . $row["id"]);
	}else{
		header("Location: login.php");
	}
}else{
	header("Location: login.php");
}
?>