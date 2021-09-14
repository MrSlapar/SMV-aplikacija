<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$conn->query("
	INSERT INTO Predmeti(naslov, kratica) VALUES
	('Matematika', 'MAT'),
	('Angleščina', 'ANG'),
	('Slovenščina', 'SLO'),
	('Sociologija', 'SOC'),
	('Zgodovina', 'ZGO'),
	('Geografija', 'GEO'),
	('Glasba', 'GLA'),
	('Likovna', 'LIK'),
	('Vzdrževanje informacijske strojne opreme', 'VIS'),
	('Stroka modernih vsebin', 'SMV')
");

$conn->query("
	INSERT INTO Profesorji(ime, priimek, password) VALUES
	('Volčanjšek', 'Slavica', ''),
	('Klavdija', 'Špur Jereb', ''),
	('Timej', 'Pirš', ''),
	('Matic', 'Holobar', ''),
	('Lubej', 'Boštjan', ''),
	('Marjeta', 'Koštomaj Gašperšič', ''),
	('Gorazd', 'Breznik', ''),
	('Jernej', 'Jančič', ''),
	('Borut', 'Slemenšek', ''),
	('Vojko', 'Podkrajšek', ''),
	('Matej', 'Kališek', ''),
	('Anita', 'Laznik', ''),
	('Vesna', 'Pišek', ''),
	('Mojmir', 'Klovar', ''),
	('Nataša', 'Besednjak', ''),
	('Matjaž', 'Drame', ''),
	('Boštjan', 'Fidler', ''),
	('Igor', 'Gobec', ''),
	('Andrej', 'Grilc', ''),
	('Bojan', 'Herman', '')
");

$conn->query("
	INSERT INTO Dijaki(ime, priimek, password) VALUES
	('Tristan', 'Gajšek', ''),
	('Domen', 'Laznik', ''),
	('Luka', 'Slapnik', ''),
	('Gašper', 'Florjan', ''),
	('Luka', 'Posteržin', ''),
	('Žan', 'Milčinovič', ''),
	('Žiga', 'Klepej', ''),
	('Žiga', 'Gorenc', ''),
	('Žiga', 'Orač', ''),
	('Luka', 'Zabav', ''),
	('Tim', 'Sešel', ''),
	('Tim', 'Puhič', ''),
	('Jože', 'Jožnik', ''),
	('Filip', 'Seničar', ''),
	('Nik', 'Nikota', ''),
	('Mark', 'Markovič', ''),
	('Tim', 'Timoto', ''),
	('Jan', 'Jankovič', ''),
	('Jaka', 'Jakaka', ''),
	('Oskar', 'Oskokolo', ''),
	('Lovro', 'Lovoro', ''),
	('David', 'Davinky', ''),
	('Maks', 'Maksimus', ''),
	('Lan', 'Laničnik', ''),
	('Gal', 'Borinc', ''),
	('Nejc', 'Neječevec', ''),
	('Anže', 'Anželod', ''),
	('Vid', 'Skamen', ''),
	('Maj', 'Kotnik', ''),
	('Lukas', 'Lukaser', ''),
	('Matic', 'Matorot', ''),
	('Aljaž', 'Vreš', ''),
	('Teo', 'Teodon', ''),
	('Nace', 'Nacerad', ''),
	('Patrik', 'Jelenc', ''),
	('Matija', 'Matalada', ''),
	('Tian', 'Tianševič', ''),
	('Izak', 'Izakovič', ''),
	('Adam', 'Adamčič', ''),
	('Leon', 'Leonard', ''),
	('Bor', 'Bornik', ''),
	('Oliver', 'Olivnik', ''),
	('Val', 'Valorant', ''),
	('Aleks', 'Aleksus', ''),
	('Anej', 'Anelol', ''),
	('Erik', 'Erikson', ''),
	('Rok', 'Rokovač', ''),
	('Tine', 'Tinovak', ''),
	('Bine', 'Fižolmojst', ''),
	('Matevž', 'Matevožec', ''),
	('Erazem', 'Erazmus', ''),
	('Vito', 'Devito', ''),
	('Tilen', 'Tilenčič', ''),
	('Miha', 'Mihita', ''),
	('Noel', 'Noelovič', ''),
	('Urban', 'Dictionary', ''),
	('Benjamin', 'Franc', ''),
	('Lenart', 'Leonardo', ''),
	('Aleksej', 'Aleksus', ''),
	('Jaša', 'Janša', ''),
	('Mateo', 'Matnik', ''),
	('Brin', 'Brindžinto', ''),
	('Jurij', 'Tarded', ''),
	('Svit', 'Svitnik', ''),
	('Leo', 'Leonid', ''),
	('Marcel', 'Marcedez', ''),
	('Jon', 'Jonzz', ''),
	('Rene', 'Podkuritnik', ''),
	('Jure', 'Hrovat', ''),
	('Enej', 'Enejko', ''),
	('Martin', 'Gluh', ''),
	('Andraž', 'Andražnik', ''),
	('Mai', 'Mai', ''),
	('Matej', 'Matenko', ''),
	('Ožbej', 'Oženkar', ''),
	('Tai', 'Thai', ''),
	('Amar', 'Amarko', ''),
	('Gabriel', 'Gabrič', ''),
	('Kris', 'Kristofer', ''),
	('Lev', 'Levica', ''),
	('Aleksander', 'Mali', ''),
	('Marko', 'Markič', ''),
	('Peter', 'Peteter', ''),
	('Viktor', 'Vok', ''),
	('Žak', 'Žakalaka', ''),
	('Timotej', 'Timičovič', ''),
	('Taj', 'Tja', ''),
	('Gaber', 'Gabič', ''),
	('Adrian', 'Adriančič', ''),
	('Nal', 'Navtilus', ''),
	('Sergej', 'Sergejevič', ''),
	('Nikola', 'Nikolaj', ''),
	('Andrej', 'Andrič', ''),
	('Zala', 'Zarič', ''),
	('Ema', 'Empor', ''),
	('Mia', 'Milčinovič', ''),
	('Julija', 'Julij', ''),
	('Sara', 'Sarnik', ''),
	('Sofija', 'Softlock', ''),
	('Hana', 'Banana', '')
");
?>