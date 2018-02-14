<?php 
	if (isSet($_POST['username']))
	{
		$username = $_POST['username'];
		$password = $_POST['password']
		
		foreach ($db->query("SELECT * FROM public.user WHERE username = '$username'") as $var)
		{
			if ($var['username'] == $username)
			{
				if ($var['password'] == $password)
				{
					session_start();
			
					$_SESSION[$user] = $var['id'];
				}
					
					header("Location: index.php"); /* Redirect browser */
				}
				else
				{	
					header("Location: login.php"); /* Redirect browser */
				}
			}
			else
			{
				header("Location: login.php"); /* Redirect browser */
			}
		} 
	}
	else
	{
		header("Location: login.php"); /* Redirect browser */
	}
?>