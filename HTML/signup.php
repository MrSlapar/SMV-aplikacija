<html>
	<head>
		<style>
			a{
				text-decoration: none;
			}
			@font-face {
				font-family: 'aquawax';
				src: url(assignmentsFont/LEMONMILK-Regular.otf);
				font-style: normal;
			}
			@font-face {
				font-family: 'roboto';
				src: url(headerFont/RoboticCyborg.ttf);
				font-style: normal;
			}
			@font-face {
				font-family: 'philosopher';
				src: url(bodyFont/PhilosopherRegular.ttf);
				font-style: normal;
			}
			
			body {
				margin: 0;
				font-family: philosopher;
			}
			
			.header {
				width: 100%;
				height: 80px;
				background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(15,175,106,1) 0%, rgba(0,192,231,1) 100%);
			}
			.item {
				text-align: center;
				width: 8%;
				height: 30;
				color: #ffffff;
				transition: 0.5s;
			}
			#homeHeader {
				float: left;
				margin-left: 25;
				padding-top: 22;
				padding-bottom: 25;
			}
			#subjectsHeader {
				float: left;
				margin-left: 1.7%;
				padding-top: 22;
				padding-bottom: 25;
			}
			#professorsHeader {
				float: left;
				margin-left: 3%;
				padding-top: 22;
				padding-bottom: 25;
			}
			#assignmentsHeader {
				float: left;
				margin-left: 5%;
				padding-top: 22;
				padding-bottom: 25;
			}
			#loginHeader {
				float: right;
				margin-right: 25;
				padding-top: 22;
				padding-bottom: 25;
			}
			.headerText {
				font-family: roboto;
				font-size: 20;
				color: #ffffff;
				font-weight: bold;
				transition: 0.5s; 
				opacity: 75%;
			}
			.headerText:hover {
				cursor: pointer;
				opacity: 100%;
			}
			
			.notifications {
				padding: 15px;	
				display: flex;
				margin-top: 20px;
				margin-bottom: 20px;
				height: 100%;
				width: 20%;
				float: left;
				background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(15,175,106,1) 0%, rgba(0,192,231,1) 100%);
				flex-direction: column;
			}
			.notifications>div {
				text-align: center;
				margin: 3%;
				width: 94%;
				background: #ffffff;
				border: 30px;
			}
			.notifications>div>span {
				font-family: aquawax;
				font-size: 15;
				color: dimgray;
				transition: 0.25s;
			}
			.notifications>div>span:hover {
				color: #00997a;
				cursor: pointer;
			}
			#notificationTitle {
				font-family: roboto;
				font-size: 20;
				color: #ffffff;
				text-align: center;
				transition: 0.5s; 
				opacity: 75%;
			}
			#notificationTitle:hover {
				cursor: pointer;
				opacity: 100%;
			}
			#login{
				background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(15,175,106,1) 0%, rgba(0,192,231,1) 100%);
				width: 50%;
				height: 50%;
				margin: auto;
				margin-top: 10%;
			}
			#login>form>table{
				padding-top: 10%;
			}
			#login>form>table, td>input{
				font-family: aquawax;
				margin: auto;
				color: white;
				font-size: 1.5em;
			}
			td>input{
				color: black;
				font-size: 1em;
			}
			.login-element{
				padding: 1%;
			}
			#logindone{
				background-color: white;
				font-size: 3em;
				font-weight: bold;
				font-family: aquawax;
				padding: 1%;
				margin-top: 5%;
				background-color: rgba(0, 0, 0, 0);
				border: none;
			}
			#signup{
				font-size: 2em;
				font-weight: bold;
				text-align: center;
				font-family: aquawax;
			}
			.aquawax-hover{
				color: white;
				opacity: 0.75;
				transition: 0.5s;
			}
			.aquawax-hover:hover{
				opacity: 1;
				cursor: pointer;
			}
		</style>
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