<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="../CSS/adminHeader.css">
		<link rel="stylesheet" href="../CSS/adminUsers.css">
	</head>
	<body>
		<div class = "header">
			<div class = "item" id = "homeHeader">
				<span class = "headerText" onclick = "location.href='index.php'">
					HOME
				</span>
			</div>
			<div class = "item" id= "subjectsHeader">
				<span class = "headerText" onclick = "location.href='subjects.php'">
					SUBJECTS
				</span>
			</div>
			<div class = "item" id= "studentsHeader">
				<span class = "headerText" onclick = "location.href='students.php'">
					STUDENTS
				</span>
			</div>
			<div class = "item" id= "professorsHeader">
				<span class = "headerText" onclick = "location.href='professors.php'">
					PROFESSORS
				</span>
			</div>
			<div class = "item" id= "assignmentsHeader">
				<span class = "headerText" onclick = "location.href='assignments.php'">
					ASSIGNMENTS
				</span>
			</div>
			<div class = "item" id= "adminHeader">
				<span class = "headerText" onclick = "location.href='admin.php'">
					ADMIN
				</span>
			</div>
			<div class = "item" id= "loginHeader">
				<span class = "headerText" onclick = "location.href='login.php'">
					LOG OUT
				</span>
			</div>
		</div>
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