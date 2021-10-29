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
		<?php include "header.php"?>
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