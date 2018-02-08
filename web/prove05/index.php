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
					echo '<div class="post">';
					echo '<p>';
					echo $var['message'] . '</p>';
					echo '</div>';
				}
		?>
		
		
	</body>
</html>