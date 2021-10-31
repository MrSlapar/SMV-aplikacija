<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

if($_POST["title"] == "" || $_POST["instructions"] == "" || $_POST["date"] == "" || $_POST["time"] == ""){
	$_SESSION["subjectsMessage"] = "You seem to have left out some information while creating the assignment.";
	header("Location: subjects.php");
	exit();
}

$conn->query("
	INSERT INTO Naloge(id_predmeta, id_profesorja, cas_objave, cas_za_oddajo, naslov, navodila) VALUES
	(" . $_POST["subject"] . ", " . $_SESSION["id"] . ", NOW(), '" . $_POST["date"] . " " . $_POST["time"] . "', '" . $_POST["title"] . "', '" . $_POST["instructions"] . "')
");
$_SESSION["subjectsMessage"] = "Your assignment has been created successfully.";
header("Location: subjects.php");
exit();
?>