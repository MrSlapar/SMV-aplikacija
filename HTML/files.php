<?php session_start(); ?>
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
			
			$Dijaki = $conn->query("SELECT * FROM Dijaki");
			$Profesorji = $conn->query("SELECT * FROM Profesorji");
			$Datoteke = $conn->query("SELECT * FROM Datoteke");
			$Naloge = $conn->query("SELECT * FROM Naloge");
			
			$Array_Dijaki = array();
			$Array_Profesorji = array();
			$Array_Datoteke = array();
			$Array_Naloge = array();
			
			for($i = 0; $row = $Dijaki->fetch_assoc(); $i++) $Array_Dijaki[$i] = $row;
			for($i = 0; $row = $Profesorji->fetch_assoc(); $i++) $Array_Profesorji[$i] = $row;
			for($i = 0; $row = $Datoteke->fetch_assoc(); $i++) $Array_Datoteke[$i] = $row;
			for($i = 0; $row = $Naloge->fetch_assoc(); $i++) $Array_Naloge[$i] = $row;
			
			// fetch_assoc ti spremeni objekt, tak da je to nujno ponovit, ker so objekti kasneje uporabljeni.
			$Dijaki = $conn->query("SELECT * FROM Dijaki");
			$Profesorji = $conn->query("SELECT * FROM Profesorji");
			$Datoteke = $conn->query("SELECT * FROM Datoteke");	
			$Naloge = $conn->query("SELECT * FROM Naloge");
		?>
		<script>	
			var Dijaki = <?php echo json_encode($Array_Dijaki)?>;
			var Profesorji = <?php echo json_encode($Array_Profesorji)?>;
			var Datoteke = <?php echo json_encode($Array_Datoteke)?>;
			var Naloge = <?php echo json_encode($Array_Naloge)?>;
			
			// table.length ne dela, zato sem uporabil row_num.
			function getDataFromRow(table, row_num, id, data){
				for(var i = 0; i < row_num; i++){
					if(table[i]["id"] == id) return table[i][data];
				}
				return null;
			}
			
			function writeFileData(id, type){
				if(type == "professor") var studentsOrProfessors = Profesorji;
				else if(type == "student") var studentsOrProfessors = Dijaki;
				
				var html = "<span class='mainTitle'>" +
							getDataFromRow(studentsOrProfessors, studentsOrProfessors.length, id, "ime") + " " +
							getDataFromRow(studentsOrProfessors, studentsOrProfessors.length, id, "priimek") + "</span>" +
						   "<br><span class='title'>Files:</span><ul>";
				
				// Izpis datotek
				var imaDatoteke = false;
				for(var i = 0; i < Datoteke.length; i++){
					if(Datoteke[i]["id_uporabnika"] == id && Datoteke[i]["tip_uporabnika"] == type){
						html += "<li>";
						html += "<span class='title'>" + Datoteke[i]["ime"] + "</span><br><br>";
						html += "<span>Date of upload: " + Datoteke[i]["cas_objave"] + "</span><br><br>";
						html += "<span>Intended as resolution for assignment: " + getDataFromRow(Naloge, Naloge.length, Datoteke[i]["id_assignmenta"], "naslov") + "</span><br><br>";
						html += "</li><br>";
						imaDatoteke = true;
					}
				}
				if(!imaDatoteke) html += "This person has yet to upload any files."
				html += "</ul>"
				
				document.getElementsByClassName("subMain")[0].innerHTML = html;
			}
		</script>
	</head>
	<body>
		<?php include "header.php"?>
		<div class = "notifications" style="overflow-x: hidden;">
			<span id = "notificationTitle">FILES</span>
			<?php echo "<div onclick=\"writeFileData(" . $_SESSION["id"] . ", '" . $_SESSION["type"] . "')\"><span>My files</span></div>"; ?>
			<span id = "notificationTitle">STUDENTS</span>
			<?php
				// Izpis dijakov
				if($Dijaki !== false){
					for($i = 0; $i < $Dijaki->num_rows; $i++){
						$row = $Dijaki->fetch_assoc();
						if($row["id"] != $_SESSION["id"]){
							echo "<div onclick=\"writeFileData(" . $row["id"] . ", 'student')\"><span>" . $row["ime"] . " " . $row["priimek"] . "</span></div>";
						}
					}
				}
				
				// Izpis profesorjev
				if($Profesorji !== false && $_SESSION["type"] == "professor"){
					echo "<span id=\"notificationTitle\">PROFESSORS</span>";
					for($i = 0; $i < $Profesorji->num_rows; $i++){
						$row = $Profesorji->fetch_assoc();
						if($row["id"] != $_SESSION["id"]){
							echo "<div onclick=\"writeFileData(" . $row["id"] . ", 'professor')\"><span>" . $row["ime"] . " " . $row["priimek"] . "</span></div>";
						}
					}
				}
			?>
		</div>
		<div class="main">
			<div class="subMain" style="overflow-x: hidden;"></div>
		</div>
	</body>
</html>