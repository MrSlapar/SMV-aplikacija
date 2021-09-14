<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$result = $conn->query("
	INSERT INTO Dijaki(ime, priimek, password) VALUES
	(" .
		"'" . $_POST["ime"] . "', " .
		"'" . $_POST["priimek"] . "', " .
		"'" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "'
	);"
);