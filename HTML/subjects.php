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
			
			function writeSubjectData(id){		
				var html = "<span class='mainTitle'>" + getDataFromRow(Predmeti, Predmeti.length, id, "naslov") + " (" + getDataFromRow(Predmeti, Predmeti.length, id, "kratica") + ")" + "</span>";
				
				var sId = <?php echo $_SESSION["id"] ?>;
				var sType = <?php echo "'" . $_SESSION["type"] . "'" ?>;
				
				for(var i = 0; i < Profesor_Predmet.length; i++){
					if(id == Profesor_Predmet[i]["id_predmeta"] && Profesor_Predmet[i]["id_profesorja"] == sId) var subjectIsAccessible = true;
				}
				if(sType != "professor") var subjectIsAccessible = false;
				
				// Za dodajanje nalog
				if(subjectIsAccessible){
					html += "<form action=\"addAssignment.php\" method=\"post\">"
					html += "Assignment title: <input name=\"title\"><br>";
					html += "Assignment instructions:<br><textarea rows=\"5\" cols=\"100\" name=\"instructions\"></textarea><br>";
					html += "Date until assignment is due: <input type=\"date\" name=\"date\"><br>";
					html += "Time until assignment is due: <input type=\"time\" name=\"time\"><br>";
					html += "<input type=\"hidden\" name=\"subject\" value=\"" + id + "\">";
					html += "<input type=\"submit\" value=\"Create assignment\"></form>";
				}
				
				html += "<br><span class='title'>Professors:</span><ul>";
				
				// Izpis profesorjev
				var soProfesorji = false;
				for(var i = 0; i < Profesor_Predmet.length; i++){
					if(Profesor_Predmet[i]["id_predmeta"] == id){
						html += "<li>" + getDataFromRow(Profesorji, Profesorji.length, Profesor_Predmet[i]["id_profesorja"], "ime") + " " + getDataFromRow(Profesorji, Profesorji.length, Profesor_Predmet[i]["id_profesorja"], "priimek") + "</li>"
						soProfesorji = true;
					}
				}
				if(!soProfesorji) html += "This subject has no professors."
				html += "</ul>";
				
				// Izpis nalog
				var imaNaloge = false;
				html += "<span class='title'>Assignments:</span><ul>";
				for(var i = 0; i < Naloge.length; i++){
					if(Naloge[i]["id_predmeta"] == id){
						var isAssignmentAccessible = Naloge[i]["id_profesorja"] == sId && sType == "professor";
						
						if(isAssignmentAccessible) html += "<form action=\"deleteAssignment.php\" method=\"post\">";
						html += "<li>";
						html += "<span class='title'>" + Naloge[i]["naslov"] + "</span> &nbsp ";
						if(isAssignmentAccessible){
							html += "<input type=\"hidden\" value=\"" + Naloge[i]["id"] + "\" name=\"assignment\">";
							html += "<input type=\"submit\" value=\"Delete assignment\"></form>";
						}else html += "<br>";
						html += "<span>Author: " + getDataFromRow(Profesorji, Profesorji.length, Naloge[i]["id_profesorja"], "ime") + " " + getDataFromRow(Profesorji, Profesorji.length, Naloge[i]["id_profesorja"], "priimek") + "</span><br><br>";
						html += "<span>" + Naloge[i]["navodila"] + "</span><br><br>";
						html += "<span>Time of creation: " + Naloge[i]["cas_objave"] + "</span><br>";
						html += "<span>Time until assignment is due: " + Naloge[i]["cas_za_oddajo"] + "</span>";
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
				if($Predmeti !== false){
					for($i = 0; $i < $Predmeti->num_rows; $i++){
						$row = $Predmeti->fetch_assoc();
						echo "<div onclick=writeSubjectData(" . $row["id"] . ")><span>" . $row["naslov"] . "</span></div>";
					}
				}
			?>
		</div>
		<div class="main">
			<div class="subMain" style="overflow-x: hidden;">
				<?php
					if(isset($_SESSION["subjectsMessage"])){
						echo "<span class=\"title\">" . $_SESSION["subjectsMessage"] . "</span>";
						unset($_SESSION["subjectsMessage"]);
					}
				?>
			</div>
		</div>
	</body>
</html>