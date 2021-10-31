<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");
?>
<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="../CSS/adminHeader.css">
		<link rel="stylesheet" href="../CSS/adminUsers.css">
	</head>
	<body>
		<?php include "header.php"?>
		<div class = "main">
			<center>
				<div class = "subMain">
					<form action="adminAssignmentsPHP.php" method="post">
						<label for = "id">Subject:<br></label>
						<select name="subject" id="user">
							<?php							
								$result = $conn->query("SELECT * FROM Predmeti ORDER BY naslov");
								if($result !== false){
									for($i = 0; $i < $result->num_rows; $i++){
										$row = $result->fetch_assoc();
										echo "<option value=\"" . $row["id"] . "\">" . $row["naslov"] . "</option>";
									}
								}
							?>
						</select>
						<br>
						<label for = "id">Professor:<br></label>
						<select name="professor" id="user">
							<?php							
								$result = $conn->query("SELECT * FROM Profesorji ORDER BY ime, priimek");
								if($result !== false){
									for($i = 0; $i < $result->num_rows; $i++){
										$row = $result->fetch_assoc();
										echo "<option value=\"" . $row["id"] . "\">" . $row["ime"] . " " . $row["priimek"] . "</option>";
									}
								}
							?>
						</select>
						<br><br>
						<select name="option" id="user">
						  <option value="1">Add</option>
						  <option value="2">Remove</option>
						</select>
						<br><br>
						<input type="submit" value="Submit">
					</form>
				</div>
			</center>
		</div>
	</body>
</html>