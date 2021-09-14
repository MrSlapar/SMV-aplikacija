<html>
	<head>
		<link rel="stylesheet" href="../CSS/login-signup.css">
	</head>
	<body>
		<div class = "header">
			<div class = "item" id = "homeHeader">
				<span class = "headerText">
					HOME
				</span>
			</div>
			<div class = "item" id= "subjectsHeader">
				<span class = "headerText">
					SUBJECTS
				</span>
			</div>
			<div class = "item" id= "professorsHeader">
				<span class = "headerText">
					PROFESSORS
				</span>
			</div>
			<div class = "item" id= "assignmentsHeader">
				<span class = "headerText">
					ASSIGNMENTS
				</span>
			</div>
			<div class = "item" id= "loginHeader">
				<span class = "headerText">
					LOGIN
				</span>
			</div>
		</div>
		<div id = "login">
			<form action="signup-check.php" method="post">
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
				<center><input type="submit" value="Sign up" id="logindone" class="aquawax-hover"></center>
				<a href="login.php"><div id="signup" class="aquawax-hover">Already have an account? Log in</div></a>
			</form>
		</div>
	</body>
</html>