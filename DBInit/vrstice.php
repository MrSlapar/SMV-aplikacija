<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("USE Eucilnica");

$conn->query("
	INSERT INTO Predmeti(naslov, kratica) VALUES
	('Math', 'MAT'),
	('English', 'ENG'),
	('Slovene', 'SLO'),
	('Sociology', 'SOC'),
	('History', 'HIS'),
	('Geography', 'GEO'),
	('Music', 'MUS'),
	('Art', 'ART'),
	('Networking', 'NET'),
	('Programming', 'PRO')
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
	('Bojan', 'Herman', ''),
	('Barack', 'Obama', '" . password_hash("SADVAUZIJA", PASSWORD_DEFAULT) . "')
");

$conn->query("
	INSERT INTO Profesor_Predmet(id_profesorja, id_predmeta) VALUES
	(1, 1),
	(2, 2),
	(3, 10),
	(4, 9),
	(5, 9),
	(6, 6),
	(7, 10),
	(8, 4),
	(9, 9),
	(10, 10),
	(11, 9),
	(12, 2),
	(13, 1),
	(14, 7),
	(15, 5),
	(16, 3),
	(17, 6),
	(18, 1),
	(19, 9),
	(20, 1)
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

$conn->query("
	INSERT INTO Naloge(id_predmeta, id_profesorja, cas_objave, cas_za_oddajo, naslov, navodila) VALUES
	(3, 1, NOW(), DATE_ADD(NOW(), INTERVAL 1 WEEK), 'First home reading', 'For this assignment, you must read atleast 17 books with 500 pages or more. Once you have completed your reading, you must put down everything in relation to the story, characters, environment, and genre of the books you\\'ve read.') 
");

$conn->query("
	INSERT INTO Datoteke(ime, id_uporabnika, tip_uporabnika, cas_objave, pot, id_assignmenta) VALUES
	('Example file', 21, 'professor', NOW(), 'Barack Obama/Example file.zip', 1)
");
?>