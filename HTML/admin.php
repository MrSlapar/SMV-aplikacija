<?php session_start(); ?>
<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="../CSS/adminHeader.css">
		<link rel="stylesheet" href="../CSS/admin.css">
	</head>
	<body>
		<?php include "header.php"?>
		<div class = "main">
			<center>
				<div class = "subMain">
					<span class = "mainChange" onclick = "location.href='adminUsers.php'">
						EDIT STUDENTS
					</span>
					<br>
					<span class = "mainChange" onclick = "location.href='adminProfessors.php'">
						EDIT PROFESSORS
					</span>
					<br>
					<span class = "mainChange" onclick = "location.href='adminSubjects.php'">
						EDIT SUBJECTS
					</span>
					<br>
					<span class = "mainChange"onclick = "location.href='adminAssignments.php'">
						ADD/REMOVE PROFESSORS FROM SUBJECTS
					</span>
				</div>
			</center>
		</div>
	</body>
</html>