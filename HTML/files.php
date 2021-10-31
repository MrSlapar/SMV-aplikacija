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
			$Dijaki = $conn->query("SELECT * FROM Dijaki ORDER BY ime, priimek");
			$Profesorji = $conn->query("SELECT * FROM Profesorji ORDER BY ime, priimek");
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
				var sId = <?php echo $_SESSION["id"] ?>;
				var sType = <?php echo "'" . $_SESSION["type"] . "'" ?>;
				if(sId == id && sType == type) var isMe = true;
				else var isMe = false;
				
				if(type == "professor") var studentsOrProfessors = Profesorji;
				else if(type == "student") var studentsOrProfessors = Dijaki;
				
				var html = "<span class='mainTitle'>" +
							getDataFromRow(studentsOrProfessors, studentsOrProfessors.length, id, "ime") + " " +
							getDataFromRow(studentsOrProfessors, studentsOrProfessors.length, id, "priimek") + "</span><br>";
				
				// Za objavljanje datotek
				if(isMe){
					html += "<form enctype=\"multipart/form-data\" action=\"uploadFile.php\" method=\"post\">";
					html += "Select file: <input type=\"file\" name=\"file\"><br>";
					html += "File name: <input name=\"filename\"><br>";
					html += "Intended for assignment: <select name=\"assignment\">";
					html += "<option value=\"0\">None</option>"
					for(var i = 0; i < Naloge.length; i++){
						html += "<option value=\"" + Naloge[i]["id"] + "\">";
						html += Naloge[i]["naslov"];
						html += "</option>";
					}
					html += "</select><br>";
					if(sType == "professor") html += "<input type=\"hidden\" name=\"name\" value=\"" + getDataFromRow(Profesorji, Profesorji.length, sId, "ime") + " " + getDataFromRow(Profesorji, Profesorji.length, sId, "priimek") + "\" />";
					else html += "<input type=\"hidden\" name=\"name\" value=\"" + getDataFromRow(Dijaki, Dijaki.length, sId, "ime") + " " + getDataFromRow(Dijaki, Dijaki.length, sId, "priimek") + "\" />";
					html += "<input type=\"submit\" value=\"Upload file\"><br></form>";
				}
				
				// Izpis datotek
				html += "<span class='title'>Files:</span><ul>";
				var imaDatoteke = false;
				for(var i = 0; i < Datoteke.length; i++){
					if(Datoteke[i]["id_uporabnika"] == id && Datoteke[i]["tip_uporabnika"] == type){
						html += "<li>";
						if(isMe) html += "<form action=\"deleteFile.php\" method=\"post\">";
						html += "<span class='title'>" + Datoteke[i]["ime"] + "</span> &nbsp ";
						if(isMe){
							html += "<input type=\"hidden\" name=\"id\" value=\"" + Datoteke[i]["id"] + "\">"; 
							html += "<input type=\"submit\" value=\"Delete file\"></form>";
						}
						html += "<span>Time of upload: " + Datoteke[i]["cas_objave"] + "</span><br>";
						if(Datoteke[i]["id_assignmenta"] != 0) html += "<span>Intended for assignment: " + getDataFromRow(Naloge, Naloge.length, Datoteke[i]["id_assignmenta"], "naslov") + "</span><br><br>";
						html += "</li><br>";
						imaDatoteke = true;
					}
				}
				if(!imaDatoteke) html += isMe ? "You've yet to upload any files." : "This person has yet to upload any files.";
				html += "</ul>";
				
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
			<div class="subMain" style="overflow-x: hidden;">
				<?php
					if(isset($_SESSION["filesMessage"])){
						echo "<span class=\"title\">" . $_SESSION["filesMessage"] . "</span>";
						unset($_SESSION["filesMessage"]);
					}
				?>
			</div>
		</div>
	</body>
</html>