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
			$Array_Profesorji = array();
			$Array_Profesor_Predmet = array();
			
			for($i = 0; $row = $Predmeti->fetch_assoc(); $i++) $Array_Predmeti[$i] = $row;
			for($i = 0; $row = $Profesorji->fetch_assoc(); $i++) $Array_Profesorji[$i] = $row;
			for($i = 0; $row = $Profesor_Predmet->fetch_assoc(); $i++) $Array_Profesor_Predmet[$i] = $row;
			
			// fetch_assoc ti spremeni objekt, tak da je to nujno ponovit, ker so objekti kasneje uporabljeni.
			$Predmeti = $conn->query("SELECT * FROM Predmeti");
			$Profesorji = $conn->query("SELECT * FROM Profesorji");
			$Profesor_Predmet = $conn->query("SELECT * FROM Profesor_Predmet");	
		?>
		<script>	
			var Predmeti = <?php echo json_encode($Array_Predmeti)?>;
			var Profesorji = <?php echo json_encode($Array_Profesorji)?>;
			var Profesor_Predmet = <?php echo json_encode($Array_Profesor_Predmet)?>;
			
			// table.length ne dela, zato sem uporabil row_num.
			function getDataFromRow(table, row_num, id, data){
				for(var i = 0; i < row_num; i++){
					if(table[i]["id"] == id) return table[i][data];
				}
				return null;
			}
			
			function writeSubjectData(i){			
				var html = "<span class='headerText'>" + getDataFromRow(Predmeti, Predmeti.length, i, "naslov").toUpperCase() + "</span>";
				document.getElementsByClassName("subMain")[0].innerHTML = html;
			}
		</script>
	</head>
	<body>
		<?php include "header.php"?>
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