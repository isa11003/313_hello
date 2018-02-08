<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			include 'header.php';
		?>
		
		
		<?php
			
			foreach ($db->query("SELECT * FROM public.post") as $var)
				{
					echo '<p> <b>';
					echo $var['message'] . ' ';
				//	echo $var['chapter'] . ':';
				//	echo $var['verse'] . ' - "';
				//	echo '</b>';
//					echo "<a href='scriptDeatil.php?";
					echo  /*$var['content'] . */'"</p>';
				}
		?>
		
		
	</body>
</html>