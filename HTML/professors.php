<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="../CSS/header.css">
		<link rel="stylesheet" href="../CSS/students.css">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";

			$conn = mysqli_connect($servername, $username, $password);
			$conn->query("USE Eucilnica");
		?>
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
			<div class = "submain">
				<table>
					<?php
						$result = $conn->query("SELECT * FROM Profesorji");
						if($result !== false){
							for($i = 0; $i < $result->num_rows; $i++){
								$row = $result->fetch_assoc();
								echo "<tr>";
								echo "<td class = 'leftColumn'>" . $row["ime"] . "</td>";
								echo "<td class = 'rightColumn'>" . $row["priimek"] . "</td>";
								echo "</tr>";
							}
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>