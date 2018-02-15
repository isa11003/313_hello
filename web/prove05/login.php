<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
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
					echo '<h2 class="error">Incorrect Username</h2>';
				}
				else if($_GET['error' === '2')
				{
					echo '<h2 class="error">Incorrect Password</h2>';
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