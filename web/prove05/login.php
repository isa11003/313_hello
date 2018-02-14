<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			include 'header.php';
			
			session_start();
			
			if (isSet($_SESSION[$user]))
			{
				header("Location: index.php"); /* Redirect browser */
			}
		?>
		<form method="post" action="validate.php" target="_self">
			username<input type="text" name="username">
			<br />
			password<input type="password" name="password">
			<br />
			<input type="submit" value="submit">
		</form>
	</body>
</html>