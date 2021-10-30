<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");


switch($_POST["user"]){
	case 1:
		$conn->query("
			UPDATE Predmeti SET
			naslov = '" . $_POST["naslov"] . "',
			kratica = '" . $_POST["kratica"] . "'
			WHERE id = " . $_POST["userID"]
		);	
		break;
	case 2:
		$conn->query("
			DELETE FROM Predmeti WHERE id = '" . $_POST["userID"] . "'"
		);
		$conn->query("
			INSERT INTO Predmeti(id, naslov, kratica) VALUES
			(" . $_POST["userID"] . ", '" . $_POST["naslov"] . "', '" . $_POST["kratica"] . "')
		");
		break;
	case 3:
		$conn->query("
			DELETE FROM Predmeti WHERE id = '" . $_POST["userID"] . "'"
		);	
		break;
}
?>