<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

switch($_POST["option"]){
	case 1:
		$conn->query("
			INSERT INTO Profesor_Predmet(id_profesorja, id_predmeta) VALUES
			(" . $_POST["professor"] . ", " . $_POST["subject"] . ")
		");
		break;
	case 2:
		$conn->query("
			DELETE FROM Profesor_Predmet WHERE id_predmeta = " . $_POST["subject"] . " AND id_profesorja = " . $_POST["professor"]
		);
		break;
}

header("Location: adminAssignments.php");
exit();
?>