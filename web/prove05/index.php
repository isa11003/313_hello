<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			include 'header.php';
		?>
		
		
		<?php
			
			//$name = $db->query("SELECT name FROM public.user WHERE id = '$var[''userid'']'");
			
			foreach ($db->query("SELECT * FROM public.post") as $var)
			{
				echo '<div class="post">';
				echo '<p class="name">' . $var['userid'] . '</p>';
				echo '<p class="right">'. $var['popularity'] . '</p>';
				echo '<p>';
				echo $var['message'] . '</p>';
				echo '<p class="right">' . $var['date'] . '</p>';
				echo '</div>';
			}
		?>
		
		
	</body>
</html>