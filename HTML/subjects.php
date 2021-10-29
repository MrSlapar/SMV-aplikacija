<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="../CSS/header.css">
		<link rel="stylesheet" href="../CSS/loggedIndex.css">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";

			$conn = mysqli_connect($servername, $username, $password);
			$conn->query("USE Eucilnica");
			
			$Predmeti = $conn->query("SELECT * FROM Predmeti");
			$Profesorji = $conn->query("SELECT * FROM Profesorji");
			$Profesor_Predmet = $conn->query("SELECT * FROM Profesor_Predmet");
			
			$Array_Predmeti = array();
			while($row = $Predmeti->fetch_assoc()){
				$Array_Predmeti = $row;
			}
			$Array_Profesorji = array();
			while($row = $Profesorji->fetch_assoc()){
				$Array_Profesorji = $row;
			}
			$Array_Profesor_Predmet = array();
			while($row = $Profesor_Predmet->fetch_assoc()){
				$Array_Profesor_Predmet = $row;
			}
		?>
		<script>		
			function writeSubjectData(i){
				var subMain = document.getElementsByClassName("subMain")[0];
				
				<?php
					$Predmeti = $conn->query("SELECT * FROM Predmeti");
					$Profesorji = $conn->query("SELECT * FROM Profesorji");
					$Profesor_Predmet = $conn->query("SELECT * FROM Profesor_Predmet");				
				?>
								
				var Predmeti = <?php echo json_encode($Predmeti)?>;
				var Profesorji = <?php echo json_encode($Profesorji)?>;
				var Profesor_Predmet = <?php echo json_encode($Profesor_Predmet)?>;
				
				var html = "<span class='headerText'>test</span>";
				subMain.innerHTML = html;				
			}
		</script>
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
		<div class = "notifications">
			<span id = "notificationTitle">
				SUBJECTS
			</span>
			<?php
				if($Predmeti !== false && $Predmeti !== null){
					for($i = 0; $i < $Predmeti->num_rows; $i++){
						$row = $Predmeti->fetch_assoc();
						echo "<div onclick=writeSubjectData(" . $row["id"] . ")><span>" . $row["naslov"] . "</span></div>";
					}
				}
			?>
		</div>
		<div class = "main">
			<div class = "subMain">
				
			</div>
		</div>
	</body>
</html>