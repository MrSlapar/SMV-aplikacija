<html>
	<head>
		<link rel="stylesheet" href="../CSS/header.css">
		<link rel="stylesheet" href="../CSS/login-signup.css">
	</head>
	<body>
		<?php include "header.php"?>
		<div id = "login">
			<form action="login-check.php" method="post">
				<table>
					<tr>
						<td class="login-element" style="text-align: right;">Name:</td>
						<td class="login-element"><input name="name"></td>
					</tr>
					<tr>
						<td class="login-element" style="text-align: right;">Surname:</td>
						<td class="login-element"><input name="surname"></td>
					</tr>
					<tr>
						<td class="login-element" style="text-align: right;">Password:&nbsp</td>
						<td class="login-element"><input type="password" name="password"></td>
					</tr>
				</table>
				<center><input type="submit" value="Log in" id="logindone" class="aquawax-hover"></center>
				<a href="signup.php"><div id="signup" class="aquawax-hover">New user? Sign up</div></a>
			</form>
		</div>
	</body>
</html>