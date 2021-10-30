<html>
	<head>
		<title>
		</title>
		<link rel="stylesheet" href="../CSS/header.css">
		<link rel="stylesheet" href="../CSS/loggedIndex.css">
		<link rel="stylesheet" href="../CSS/subjects.css">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";

			$conn = mysqli_connect($servername, $username, $password);
			$conn->query("USE Eucilnica");
			
			$Predmeti = $conn->query("SELECT * FROM Predmeti");
			$Profesorji = $conn->query("SELECT * FROM Profesorji");
			$Profesor_Predmet = $conn->query("SELECT * FROM Profesor_Predmet");
			$Naloge = $conn->query("SELECT * FROM Naloge");
			
			$Array_Predmeti = array();
			$Array_Profesorji = array();
			$Array_Profesor_Predmet = array();
			$Array_Naloge = array();
			
			for($i = 0; $row = $Predmeti->fetch_assoc(); $i++) $Array_Predmeti[$i] = $row;
			for($i = 0; $row = $Profesorji->fetch_assoc(); $i++) $Array_Profesorji[$i] = $row;
			for($i = 0; $row = $Profesor_Predmet->fetch_assoc(); $i++) $Array_Profesor_Predmet[$i] = $row;
			for($i = 0; $row = $Naloge->fetch_assoc(); $i++) $Array_Naloge[$i] = $row;
			
			// fetch_assoc ti spremeni objekt, tak da je to nujno ponovit, ker so objekti kasneje uporabljeni.
			$Predmeti = $conn->query("SELECT * FROM Predmeti");
			$Profesorji = $conn->query("SELECT * FROM Profesorji");
			$Profesor_Predmet = $conn->query("SELECT * FROM Profesor_Predmet");	
			$Naloge = $conn->query("SELECT * FROM Naloge");
		?>
		<script>	
			var Predmeti = <?php echo json_encode($Array_Predmeti)?>;
			var Profesorji = <?php echo json_encode($Array_Profesorji)?>;
			var Profesor_Predmet = <?php echo json_encode($Array_Profesor_Predmet)?>;
			var Naloge = <?php echo json_encode($Array_Naloge)?>;
			
			// table.length ne dela, zato sem uporabil row_num.
			function getDataFromRow(table, row_num, id, data){
				for(var i = 0; i < row_num; i++){
					if(table[i]["id"] == id) return table[i][data];
				}
				return null;
			}
			
			function writeSubjectData(i){			
				var html = "<span class='mainTitle'>" + getDataFromRow(Predmeti, Predmeti.length, i, "naslov") + " (" + getDataFromRow(Predmeti, Predmeti.length, i, "kratica") + ")" + "</span>" + // Naslov predmeta in kratica
						   "<br><span class='title'>Professors:</span><ul>";
				
				// Izpis profesorjev
				var soProfesorji = false;
				for(var j = 0; j < Profesor_Predmet.length; j++){
					if(Profesor_Predmet[j]["id_predmeta"] == i){
						html += "<li>" + getDataFromRow(Profesorji, Profesorji.length, Profesor_Predmet[j]["id_profesorja"], "ime") + " " + getDataFromRow(Profesorji, Profesorji.length, Profesor_Predmet[j]["id_profesorja"], "priimek") + "</li>"
						soProfesorji = true;
					}
				}
				if(!soProfesorji) html += "This subjects has no professors."
				html += "</ul>";
				
				// Izpis nalog
				var imaNaloge = false;
				html += "<span class='title'>Assignments:</span><ul>";
				for(var j = 0; j < Naloge.length; j++){
					if(Naloge[j]["id_predmeta"] == i){
						html += "<li>";
						html += "<span class='title'>" + Naloge[j]["naslov"] + "</span><br>"
						html += "<span>" + Naloge[j]["navodila"] + "</span><br><br>"
						html += "<span>Date of creation: " + Naloge[j]["cas_objave"] + "</span><br>"
						html += "<span>Date until assignment is due: " + Naloge[j]["cas_za_oddajo"] + "</span>"
						html += "</li><br>";
						imaNaloge = true;
					}
				}
				if(!imaNaloge) html += "This subject has no assignemnts."
				html += "</ul>";
				
				document.getElementsByClassName("subMain")[0].innerHTML = html;
			}
		</script>
	</head>
	<body>
		<?php include "header.php"?>
		<div class = "notifications" style="overflow-x: hidden;">
			<span id = "notificationTitle">SUBJECTS</span>
			<?php
				if($Predmeti !== false && $Predmeti !== null){
					for($i = 0; $i < $Predmeti->num_rows; $i++){
						$row = $Predmeti->fetch_assoc();
						echo "<div onclick=writeSubjectData(" . $row["id"] . ")><span>" . $row["naslov"] . "</span></div>";
					}
				}
			?>
		</div>
		<div class="main">
			<div class="subMain" style="overflow-x: hidden;"></div>
		</div>
	</body>
</html>