<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			include 'header.php';
				session_start();
				
				$loggedUserId;
			
				if (!isSet($_SESSION['user']))
				{
					header("Location: login.php"); /* Redirect browser */
				}
				else
				{
					$loggedUser = $_SESSION['user'];
					$loggedUserid = $_SESSION['id'];
					foreach($db->query("SELECT * FROM public.user WHERE id = '$loggedUser'") as $usr)
					{
						echo '<h3>Welcome ' . $usr['name'] .'!</h3>';
					}
				}
				
				
				//writing to database
				if (isSet($_POST['post']))
			{
				$message = $_POST['post'];
				
				$db->query("INSERT INTO public.post(userid, message) VALUES ('$loggedUserId', '$post')");
//				$newid = $db->lastInsertId('scripture_id_seq');
				
				
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
		
		<form method="post" action="index.php" target="_self">
			<?php
				foreach ($db->query('SELECT * FROM topic') as $top)
				{
					echo '<input type="checkbox" name="topic[]" value="'. $top['id'] . '">' . $top['name'] . '<br />';	
				}
			?>
			<p> Make a post!</p>
			<textarea cols="50" rows="5" name="post"></textarea><br />
			<input type="submit">
		</form>
		
		
	</body>
</html>