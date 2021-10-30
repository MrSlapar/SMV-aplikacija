<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
$conn->query("CREATE DATABASE Eucilnica");
$conn->query("USE Eucilnica");

$conn->query("
	CREATE TABLE Predmeti(
		id int PRIMARY KEY AUTO_INCREMENT,
		naslov varchar(30) NOT NULL,
		kratica varchar(3) NOT NULL
	)
");

$conn->query("
	CREATE TABLE Profesorji(
		id int PRIMARY KEY AUTO_INCREMENT,
		ime varchar(30) NOT NULL,
		priimek varchar(30) NOT NULL,
		password varchar(255) NOT NULL
	)
");

$conn->query("
	CREATE TABLE Dijaki(
		id int PRIMARY KEY AUTO_INCREMENT,
		ime varchar(30) NOT NULL,
		priimek varchar(30) NOT NULL,
		password varchar(255) NOT NULL
	)
");

$conn->query("
	CREATE TABLE Profesor_Predmet(
		id_profesorja int NOT NULL,
		id_predmeta int NOT NULL
	)
");
?>