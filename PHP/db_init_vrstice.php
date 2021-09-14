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
	INSERT INTO Profesorji(ime, priimek, starost) VALUES
	('Volčanjšek', 'Slavica', 30),
	('Klavdija', 'Špur Jereb', 31),
	('Timej', 'Pirš', 32),
	('Matic', 'Holobar', 33),
	('Lubej', 'Boštjan', 34),
	('Marjeta', 'Koštomaj Gašperšič', 35),
	('Gorazd', 'Breznik', 36),
	('Jernej', 'Jančič', 37),
	('Borut', 'Slemenšek', 38),
	('Vojko', 'Podkrajšek', 39),
	('Matej', 'Kališek', 30),
	('Anita', 'Laznik', 31),
	('Vesna', 'Pišek', 32),
	('Mojmir Klovar', '', 33),
	('Nataša', 'Besednjak', 34),
	('Matjaž', 'Drame', 35),
	('Boštjan', 'Fidler', 36),
	('Igor', 'Gobec', 37),
	('Andrej', 'Grilc', 38),
	('Bojan', 'Herman', 39)
");

$conn->query("
	INSERT INTO Dijaki(ime, priimek, starost) VALUES
	('Tristan', 'Gajšek', 16),
	('Domen', 'Laznik', 17),
	('Luka', 'Slapnik', 18),
	('Gašper', 'Florjan', 19),
	('Luka', 'Posteržin', 16),
	('Žan', 'Milčinovič', 17),
	('Žiga', 'Klepej', 18),
	('Žiga', 'Gorenc', 19),
	('Žiga', 'Orač', 16),
	('Luka', 'Zabav', 17),
	('Tim', 'Sešel', 18),
	('Tim', 'Puhič', 19),
	('Jože', 'Jožnik', 16),
	('Filip', 'Seničar', 17),
	('Nik', 'Nikota', 18),
	('Mark', 'Markovič', 19),
	('Tim', 'Timoto', 16),
	('Jan', 'Jankovič', 17),
	('Jaka', 'Jakaka', 18),
	('Oskar', 'Oskokolo', 19),
	('Lovro', 'Lovoro', 16),
	('David', 'Davinky', 17),
	('Maks', 'Maksimus', 18),
	('Lan', 'Laničnik', 19),
	('Gal', 'Borinc', 16),
	('Nejc', 'Neječevec', 17),
	('Anže', 'Anželod', 18),
	('Vid', 'Skamen', 19),
	('Maj', 'Kotnik', 16),
	('Lukas', 'Lukaser', 17),
	('Matic', 'Matorot', 18),
	('Aljaž', 'Vreš', 19),
	('Teo', 'Teodon', 16),
	('Nace', 'Nacerad', 17),
	('Patrik', 'Jelenc', 18),
	('Matija', 'Matalada', 19),
	('Tian', 'Tianševič', 16),
	('Izak', 'Izakovič', 17),
	('Adam', 'Adamčič', 18),
	('Leon', 'Leonard', 19),
	('Bor', 'Bornik', 16),
	('Oliver', 'Olivnik', 17),
	('Val', 'Valorant', 18),
	('Aleks', 'Aleksus', 19),
	('Anej', 'Anelol', 16),
	('Erik', 'Erikson', 17),
	('Rok', 'Rokovač', 18),
	('Tine', 'Tinovak', 19),
	('Bine', 'Fižolmojst', 16),
	('Matevž', 'Matevožec', 17),
	('Erazem', 'Erazmus', 18),
	('Vito', 'Devito', 19),
	('Tilen', 'Tilenčič', 16),
	('Miha', 'Mihita', 17),
	('Noel', 'Noelovič', 18),
	('Urban', 'Dictionary', 19),
	('Benjamin', 'Franc', 16),
	('Lenart', 'Leonardo', 17),
	('Aleksej', 'Aleksus', 18),
	('Jaša', 'Janša', 19),
	('Mateo', 'Matnik', 16),
	('Brin', 'Brindžinto', 17),
	('Jurij', 'Tarded', 18),
	('Svit', 'Svitnik', 19),
	('Leo', 'Leonid', 16),
	('Marcel', 'Marcedez', 17),
	('Jon', 'Jonzz', 18),
	('Rene', 'Podkuritnik', 19),
	('Jure', 'Hrovat', 16),
	('Enej', 'Enejko', 17),
	('Martin', 'Gluh', 18),
	('Andraž', 'Andražnik', 19),
	('Mai', 'Mai', 16),
	('Matej', 'Matenko', 17),
	('Ožbej', 'Oženkar', 18),
	('Tai', 'Thai', 19),
	('Amar', 'Amarko', 16),
	('Gabriel', 'Gabrič', 17),
	('Kris', 'Kristofer', 18),
	('Lev', 'Levica', 19),
	('Aleksander', 'Mali', 16),
	('Marko', 'Markič', 17),
	('Peter', 'Peteter', 18),
	('Viktor', 'Vok', 19),
	('Žak', 'Žakalaka', 16),
	('Timotej', 'Timičovič', 17),
	('Taj', 'Tja', 18),
	('Gaber', 'Gabič', 19),
	('Adrian', 'Adriančič', 16),
	('Nal', 'Navtilus', 17),
	('Sergej', 'Sergejevič', 18),
	('Nikola', 'Nikolaj', 19),
	('Andrej', 'Andrič', 16),
	('Zala', 'Zarič', 17),
	('Ema', 'Empor', 18),
	('Mia', 'Milčinovič', 19),
	('Julija', 'Julij', 16),
	('Sara', 'Sarnik', 17),
	('Sofija', 'Softlock', 18),
	('Hana', 'Banana', 19)
");
?>