<?php
	
	$dbUrl = getenv('DATABASE_URL');
	$dbopts = parse_url($dbUrl);
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	session_start();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query = 'SELECT username, password, id FROM public.user WHERE username = :username';
	
	
	$statement = $db->prepare($query);
						
	$statement->bindValue(':username', $username);
	
	$statement->execute();
	
	$user = $statement->fetch();
	
	if (!isSet($user))
	{
		if ($user['password'] == $password)
		{
			$_SESSION['user'] = $user['id'];
			
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
	
?>