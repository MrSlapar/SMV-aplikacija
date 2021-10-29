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