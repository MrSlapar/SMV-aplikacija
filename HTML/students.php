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
				<span class = "headerText">
					HOME
				</span>
			</div>
			<div class = "item" id= "subjectsHeader">
				<span class = "headerText">
					SUBJECTS
				</span>
			</div>
			<div class = "item" id= "studentsHeader">
				<span class = "headerText">
					STUDENTS
				</span>
			</div>
			<div class = "item" id= "professorsHeader">
				<span class = "headerText">
					PROFESSORS
				</span>
			</div>
			<div class = "item" id= "assignmentsHeader">
				<span class = "headerText">
					ASSIGNMENTS
				</span>
			</div>
			<div class = "item" id= "adminHeader">
				<span class = "headerText">
					ADMIN
				</span>
			</div>
			<div class = "item" id= "loginHeader">
				<span class = "headerText">
					LOG OUT
				</span>
			</div>
		</div>
		<div class = "main">
			<div class = "submain">
				<table>
					<?php
						$result = $conn->query("SELECT * FROM Dijaki");
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