<?php session_start(); ?>
<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="../CSS/adminHeader.css">
		<link rel="stylesheet" href="../CSS/adminUsers.css">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";

			$conn = mysqli_connect($servername, $username, $password);
			$conn->query("USE Eucilnica");
		?>
	</head>
	<body>
		<?php include "header.php"?>
		<div class = "main">
			<center>
				<div class = "subMain">
					<form action="adminSubjectsPHP.php" method="post">
						<label for = "id">Subject:<br></label>
						<select name="userID">
						<?php
							$result = $conn->query("SELECT id, naslov FROM Predmeti ORDER BY naslov");
							if($result !== false){
								for($i = 0; $i < $result->num_rows; $i++){
									$row = $result->fetch_assoc();
									echo "<option value=\"" . $row["id"] . "\">" . $row["naslov"] . "</option>";
								}
							}
						?>
						</select>
						<br><br>
						<select name="user" id="user">
						  <option value="1">Edit</option>
						  <option value="2">Add</option>
						  <option value="3">Remove</option>
						</select>
						<br><br>
						<label for = "naslov">Naslov:<br></label>
						<input type="text" id="naslov" name="naslov">
						<br>
						<label for = "kratica">Kratica:<br></label>
						<input type="text" id="kratica" name="kratica">
						<br><br>
						<input type="submit" value="Submit">
					</form>
				</div>
			</center>
		</div>
	</body>
</html>