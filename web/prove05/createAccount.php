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
	$name = $_POST['name'];
	
	$query = 'INSERT INTO public.user(name, username, password) VALUES (:name, :username, :password)';
	$statement = $db->prepare($query);
						
	$statement->bindValue(':name', $name);
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $password);
	
	$statement->execute();
	
	$_SESSION['user'] = $db->lastInsertId('public.user_id_seq');
				

	header("Location: index.php"); /* Redirect browser */
	
?>