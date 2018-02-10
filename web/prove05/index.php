<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			include 'header.php';
		?>
		
		
		<?php
			
			
			foreach ($db->query("SELECT userid, name, popularity, date, message FROM public.post
								JOIN public.user ON public.post.userid = public.user.id
								ORDER By date DESC") as $var)
			{
				echo '<div class="post">';
				echo '<p class="name">' . $var['name']. '</p>';
				echo '<p>';
				echo $var['message'] . '</p>';
				echo '<button class="right pop">'. $var['popularity'] . '</button>';
				$date = substr($var['date'], 0, 10);;
				echo '<p class="right">';
				echo date('F j, Y',strtotime($date));
				echo '</p>';
				echo '</div>';
			}
		?>
		
		
	</body>
</html>