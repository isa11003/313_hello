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
				die();
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
			
			if(isSet($_POST['postId']))
			{
				$postId = $_POST['postId'];
				$userId = $_POST['userId'];
				
				$query = "INSERT INTO public.like (userid, postid) VALUES('$userId','$postId') ";
				
				$request = $db->prepare($query);
				
				if ($request->execute())
					$db->query("UPDATE public.post SET popularity = popularity + 1 WHERE id = '$postId'");
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
				foreach ($db->query("SELECT userid, name, public.post.id, popularity, date, message FROM public.post
									JOIN public.user ON public.post.userid = public.user.id
									ORDER By date DESC") as $var)
				{
					echo '<div class="post">';
					echo '<p class="name">' . $var['name']. '</p>';
					echo '<p>';
					echo $var['message'] . '</p>';
					
					echo '<form method="post" action="index.php" target="_self">';
					echo "<input type='hidden' name='postId' value='" . $var['id'] . "'>";
					echo "<input type='hidden' name='userId' value='" . $var['userid'] . "'>";
					echo '<input type="submit" value="' . $var['popularity'] . '">';
					echo '</form>';
					
					//echo '<button class="right pop">'. $var['popularity'] . '</button>';
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