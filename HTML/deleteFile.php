<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$result = $conn->query("SELECT pot FROM Datoteke WHERE id = " . $_POST["id"]);
if($result !== false){
	$row = $result->fetch_assoc();
	unlink("../files/" . $row["pot"]);
	$conn->query("DELETE FROM Datoteke WHERE pot = '" . $row["pot"] . "'");
}

$_SESSION["filesMessage"] = "Your files have been deleted successfully.";
header("Location: files.php");
exit();
?>