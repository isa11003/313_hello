<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			include 'header.php';
				session_start();
			
				if (!isSet($_SESSION[$user]))
				{
					//header("Location: login.php"); /* Redirect browser */
				}
				
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
		
		<form method="post" action="team05.php" target="_self">
			<?php
				foreach ($db->query('SELECT * FROM topic') as $top)
				{
					echo '<input type="checkbox" name="topic[]" value="'. $top['id'] . '">' . $top['name'] . '<br />';	
				}
			?>
			<input type="text" name="book">Book <br />
			<input type="text" name="chapter">Chapter <br />
			<input type="text" name="verse">Verse <br />
			<textarea cols="50" rows="5" name="content"></textarea>Content <br />
			<input type="submit">
		</form>
		
		
	</body>
</html>