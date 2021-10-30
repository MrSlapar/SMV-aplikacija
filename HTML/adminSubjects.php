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
					<form>
						<label for = "id">Subject ID:<br></label>
						<input type="text" id="id" name="userID">
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