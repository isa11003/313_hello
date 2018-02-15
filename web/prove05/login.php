<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="js.js"></script>
	</head>
	<body>
		<?php
			include 'header.php';
			
			session_start();
			
			if (isSet($_SESSION['user']))
			{
				header("Location: index.php"); /* Redirect browser */
			}
			
			if (isSet($_GET['error']))
			{
				if ($_GET['error'] === '1')
				{
					echo '<h2 class="error">Incorrect Password</h2>';
				}
				else if($_GET['error'] === '2')
				{
					echo '<h2 class="error">Incorrect Username</h2>';
				}
			}
		?>
		<form method="post" action="validate.php" target="_self" onsubmit="return validateLogin()">
			username<input id="usrname" type="text" name="username">
			<br />
			password<input id="pass" type="password" name="password">
			<br />
			<input type="submit" value="Login">
		</form>
	</body>
</html>