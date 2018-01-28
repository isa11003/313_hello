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
			
			
			$address = htmlspecialchars($_POST["address"]);
			
			$toast = 'toaster';
			for($i = 1; $i <= 6; $i++){
				$toasters = $toast . 't' . $i;
				if (isset($_SESSION[$toasters])){
					$imgSrc = 'toaster' . $i . '.png';
					echo '<img src="' . $imgSrc . '"  width="100px" height="100px" /> <br />';
					
				}
				
			}
			echo "<h2> Shipping to address <br />";
			echo $address;
			echo "<br /> Thank you for your purchase</h2>";
			
		?>
	</body>
</html>

<?php
	session_destroy();
?>