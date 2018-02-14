<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			include 'header.php';
			
			session_start();
			
		?>
		<form method="post" action="createAccount.php" target="_self">
			screen name<input type="text" name="name">
			<br />
			username<input type="text" name="username">
			<br />
			password<input type="password" name="password">
			<br />
			<input type="submit" value="submit">
		</form>
	</body>
</html>