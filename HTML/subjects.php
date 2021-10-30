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
			
			// Deluje isto kot getDataFromRow, ampak je namenjeno tabelam, kjer ni PK.
			function getDataFromRow2(table, row_num, id_name, id, data){
				var dataArray = [];
				for(var i = 0; i < row_num; i++){
					if(table[i][id_name] == id) dataArray.push(table[i][data]);
				}
				return dataArray;
			}
			
			function writeSubjectData(i){			
				var html = "<span>" + getDataFromRow(Predmeti, Predmeti.length, i, "naslov") + " (" + getDataFromRow(Predmeti, Predmeti.length, i, "kratica") + ")" + "</span>" + // Naslov predmeta in kratica
						   "<br>Professors:<ul>";
				
				// Izpis profesorjev
				var soProfesorji = false;
				for(var j = 0; j < Profesor_Predmet.length; j++){
					if(Profesor_Predmet[j]["id_predmeta"] == i){
						html += "<li>" + getDataFromRow(Profesorji, Profesorji.length, Profesor_Predmet[j]["id_profesorja"], "ime") + " " + getDataFromRow(Profesorji, Profesorji.length, Profesor_Predmet[j]["id_profesorja"], "priimek") + "</li>"
						soProfesorji = true;
					}
				}
				if(!soProfesorji) html += "This subject doesn't have any professors."
				html += "</ul><br>";
				
				// Izpis nalog
				html += "<span>Assignments:</span>";
				
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
			<div class = "subMain"></div>
		</div>
	</body>
</html>