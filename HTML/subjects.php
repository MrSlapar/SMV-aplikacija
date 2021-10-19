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
		?>
		<script>
			var Predmet_id_naslov = <?php echo json_encode($Predmet_id_naslov)?>;
			var Profesorji_ALL = <?php echo json_encode($Profesorji_ALL)?>;
			var Profesor_Predmet_ALL = <?php echo json_encode($Profesor_Predmet_ALL)?>;
			
			function writeSubjectData(var i){
				var subMain = getElementsByClass("subMain");
				
				<?php
					$Predmeti = $conn->query("SELECT * FROM Predmeti");
					$Profesorji = $conn->query("SELECT * FROM Profesorji");
					$Profesor_Predmet = $conn->query("SELECT * FROM Profesor_Predmet");
					
					
				?>
				
				var html = "<span class='headerText'>" .  . "</span>"
			}
		</script>
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
		<div class = "notifications">
			<span id = "notificationTitle">
				SUBJECTS
			</span>
			<?php
				if($Predmet_id_naslov !== false){
					for($i = 0; $i < $Predmet_id_naslov->num_rows; $i++){
						$row = $Predmet_id_naslov->fetch_assoc();
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