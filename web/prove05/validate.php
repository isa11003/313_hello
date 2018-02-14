<?php
	
	$dbUrl = getenv('DATABASE_URL');
	$dbopts = parse_url($dbUrl);
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	$username = $_POST['username'];
	$password = $_POST['p	assword']
	
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
?>