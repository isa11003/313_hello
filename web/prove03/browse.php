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
			
			if (isset($_POST['toaster'])){
				$toastVal = $_POST['toaster'];
				$toaster = 'toaster' . $toastVal;
				if (isset($_SESSION[$toaster])){
					$_SESSION[$toaster]++;
				}
				else{
					$_SESSION[$toaster] = 1;
				}
			}
			
			
		?>
		
		<h1>Buy Something!!!</h1>
		<form action="browse.php" method="post" target="_self">
		<div id = "listContainer">
			<ul>
				<li><img src="toaster1.png" width="400px" height="400px" /><button name="toaster" value="t1" type="submit">Add to Cart</button></li>
				<li><img src="toaster2.png" width="400px" height="400px" /><button name="toaster" value="t2" type="submit">Add to Cart</button></li>
				<li><img src="toaster3.png" width="400px" height="400px" /><button name="toaster" value="t3" type="submit">Add to Cart</button></li>
				<li><img src="toaster4.png" width="400px" height="400px" /><button name="toaster" value="t4" type="submit">Add to Cart</button></li>
				<li><img src="toaster5.png" width="400px" height="400px" /><button name="toaster" value="t5" type="submit">Add to Cart</button></li>
				<li><img src="toaster6.png" width="400px" height="400px" /><button name="toaster" value="t6" type="submit">Add to Cart</button></li>
			</ul>
		</div>
		</form>
	</body>
</html>