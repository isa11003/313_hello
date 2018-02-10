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
			
			foreach ($db->query("SELECT userid, name, popularity, date::DATE, message FROM public.post
								JOIN public.user ON public.post.userid = public.user.id
								ORDER By date desc") as $var)
			{
				echo '<div class="post">';
				echo '<p class="name">' . $var['name']. '</p>';
				echo '<p>';
				echo $var['message'] . '</p>';
				if (isset($var['popularity']))
					echo '<button class="right pop">'. $var['popularity'] . '</button>';
				else
					echo '<button class="right pop">0</button>';
				echo '<p class="right">' . $var['date'] . '</p>';
				echo '</div>';
			}
		?>
		
		
	</body>
</html>