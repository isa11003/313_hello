<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="js.js"></script>
	</head>
	<body>
		<?php
			include 'header.php';
			session_start();
			
			if (!isSet($_SESSION['user']))
			{
				header("Location: login.php"); /* Redirect browser */
			}
			else
			{
				$loggedUser = $_SESSION['user'];
				foreach($db->query("SELECT name FROM public.user WHERE id = '$loggedUser'") as $usr)
				{
					echo '<h3>Welcome ' . $usr['name'] .'!</h3>';
					
					//writing to database
					if (isSet($_POST['post']))
					{
						$message = htmlspecialchars($_POST['post']);
						
						$query = "INSERT INTO public.post(userid, message) VALUES ('$loggedUser', :message)";
						$statement = $db->prepare($query);
						
						$statement->bindValue(':message', $message);
						
						$statement->execute();
					}
				}
			}
				
				
			
				
		?>
		
		
		<?php
			
			if (isSet($_GET['view']))
			{
				if ($_GET['view'] === 'p')
				{
					foreach ($db->query("SELECT userid, name, popularity, date, message FROM public.post
									JOIN public.user ON public.post.userid = public.user.id
									ORDER BY popularity DESC") as $var)
					{
						echo '<div class="post">';
						echo '<p class="name">' . $var['name']. '</p>';
						echo '<p>';
						echo $var['message'] . '</p>';
						echo '<button class="right pop">'. $var['popularity'] . '</button>';
			
						$date = substr($var['date'], 0, 10);
						echo '<p class="right">';
						echo date('F j, Y',strtotime($date));
						echo '</p>';
						echo '</div>';
					}	
				}
			}
			else
			{
				foreach ($db->query("SELECT userid, name, popularity, date, message FROM public.post
									JOIN public.user ON public.post.userid = public.user.id
									ORDER By date DESC") as $var)
				{
					echo '<div class="post">';
					echo '<p class="name">' . $var['name']. '</p>';
					echo '<p>';
					echo $var['message'] . '</p>';
					echo '<button class="right pop">'. $var['popularity'] . '</button>';
					$date = substr($var['date'], 0, 10);
					echo '<p class="right">';
					echo date('F j, Y',strtotime($date));
					echo '</p>';
					echo '</div>';
				}
			}
		?>
		
		<form method="post" action="index.php" target="_self" onsubmit="return validatePost()">
			<p> Make a post!</p>
			<textarea id="messagePost" cols="100" rows="5" name="post"></textarea><br />
			<input type="submit" value="Post">
		</form>
		
		
	</body>
</html>