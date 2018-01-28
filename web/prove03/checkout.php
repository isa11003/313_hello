<html>
	<head>
		<title>Prove03</title>
		<link href="style.css" rel="stylesheet" />
		<script src="js.js"></script>
	</head>
	<body>
		<?php
			include "header.php";
			
			session_start();
			$toast = 'toaster';
			for($i = 1; $i <= 6; $i++){
				$toasters = $toast . 't' . $i;
				if (isset($_SESSION[$toasters])){
					$imgSrc = 'toaster' . $i . '.png';
					echo '<img src="' . $imgSrc . '"  width="100px" height="100px" /><br />';
					
				}
			}
		?>
		<form method="post" action="confirmation.php" target="_self">
			<textarea cols="50" rows="4" name="address" placeholder="Please Type Address Here"></textarea>
			<br />
			<input type="submit" value="Check Out" />
		</form>
	</body>
</html>