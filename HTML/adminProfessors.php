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
					<form action="adminProfessorsPHP.php" method="post">
						<label for = "id">Professor:<br></label>
						<select name="userID">
						<?php
							$result = $conn->query("SELECT * FROM Profesorji WHERE id != 21 ORDER BY ime, priimek");
							if($result !== false){
								for($i = 0; $i < $result->num_rows; $i++){
									$row = $result->fetch_assoc();
									echo "<option value=\"" . $row["id"] . "\">" . $row["ime"] . " " . $row["priimek"] . "</option>";
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
						<label for = "name">Name:<br></label>
						<input type="text" id="name" name="userName">
						<br>
						<label for = "lastname">Last name:<br></label>
						<input type="text" id="lastname" name="userLastname">
						<br>
						<label for = "password">Password:<br></label>
						<input type="password" id="password" name="userPassword">
						<br><br>
						<input type="submit" value="Submit">
					</form>
				</div>
			</center>
		</div>
	</body>
</html>