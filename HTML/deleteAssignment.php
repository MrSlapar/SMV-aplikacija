<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$conn->query("DELETE FROM Naloge WHERE id = " . $_POST["assignment"]);

$_SESSION["subjectsMessage"] = "Your assignment has been deleted successfully.";
header("Location: subjects.php");
exit();
?>