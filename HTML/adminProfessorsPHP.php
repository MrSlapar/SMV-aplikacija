<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");


switch($_POST["user"]){
	case 1:
		$conn->query("
			UPDATE Profesorji SET
			ime = '" . $_POST["userName"] . "',
			priimek = '" . $_POST["userLastname"] . "',
			password = '" . password_hash($_POST["userPassword"], PASSWORD_DEFAULT) . "'
			WHERE id = " . $_POST["userID"]
		);
		break;
	case 2:
		$conn->query("
			DELETE FROM Profesorji WHERE id = '" . $_POST["userID"] . "'"
		);
		$conn->query("
			INSERT INTO Profesorji(id, ime, priimek, password) VALUES
			(" . $_POST["userID"] . ", '" . $_POST["userName"] . "', '" . $_POST["userLastname"] . "', '" . password_hash($_POST["userPassword"], PASSWORD_DEFAULT) . "')
		");
		break;
	case 3:
		$conn->query("
			DELETE FROM Profesorji WHERE id = '" . $_POST["userID"] . "'"
		);	
		break;
}
?>