<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="js.js"></script>
	</head>
	<body>
		<?php
			include 'header.php';
			
			session_start();
			
			
			if (isSet($_GET['error']))
			{
				if ($_GET['error'] === '1')
				{
					echo '<h2 class="error">Username already exsists</h2>';
				}
			}
		?>
		
		
		
		<form method="post" action="createAccount.php" target="_self" onsubmit="return validateCreateUser()">
			screen name&nbsp;<input id="scrname" type="text" name="name">
			<br />
			username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="usrname" type="text" name="username">
			<br />
			password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="pass" type="password" name="password">
			<br />
			password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="passV" type="confirm password" name="passwordV">
			<br />
			<input type="submit" value="Create Account">
		</form>
	</body>
</html>