<html>
	<head>
		<title>Prove03</title>
		<link href="style.css" rel="stylesheet" />
		<script src="js.js"> </script>
	</head>
	<body>
		<?php
			include "header.php";
			session_start();
			
			if (isset($_POST['remove'])){
				$toastVal = $_POST['remove'];
				$toaster = 'toaster' . $toastVal;
				unset($_SESSION[$toaster]);
			}
			
		?>
		
		<form method="post" action="cart.php" target="_self">
		
		<?php
			
			$toast = 'toaster';
			for($i = 1; $i <= 6; $i++){
				$toasters = $toast . 't' . $i;
				if (isset($_SESSION[$toasters])){
					$imgSrc = 'toaster' . $i . '.png';
					echo '<img src="' . $imgSrc . '"  width="400px" height="400px" />';
					echo '<button type="submit" name="remove" value="t' . $i . '">Remove</button><br />';
					
				}
			}
			
		?>
		</form>
	</body>
</html>