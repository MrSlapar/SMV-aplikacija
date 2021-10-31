<?php
session_start();

if($_POST["filename"] == "" || $_FILES["file"]["tmp_name"] == ""){
	$_SESSION["filesMessage"] = "You seem to have left out some information while uploading the file.";
	header("Location: files.php");
	exit();
}

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$path = $_POST["name"] . "/" . $_FILES["file"]["name"];
$path2 = "../files/" . $path;

mkdir("../files");
mkdir("../files/" . $_POST["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $path2);

$conn->query("
	INSERT INTO Datoteke(ime, id_uporabnika, tip_uporabnika, cas_objave, pot, id_assignmenta) VALUES
	('" . $_POST["filename"] . "', " . $_SESSION["id"] . ", '" . $_SESSION["type"] . "', NOW(), '" . $path . "', " . $_POST["assignment"] . ")
");

$_SESSION["filesMessage"] = "Your files have been uploaded successfully.";
header("Location: files.php");
exit();
?>