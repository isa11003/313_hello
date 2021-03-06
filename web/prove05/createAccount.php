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
	
	$username = htmlspecialchars($_POST['username']);
	$password = htmlspecialchars($_POST['password']);
	$name = htmlspecialchars($_POST['name']);
	
	$query = 'INSERT INTO public.user(name, username, password) VALUES (:name, :username, :password)';
	$statement = $db->prepare($query);
						
	$statement->bindValue(':name', $name);
	$statement->bindValue(':username', $username);
	$hashedPass = password_hash($password, PASSWORD_DEFAULT);
	$statement->bindValue(':password', $hashedPass);
	
	if ($statement->execute()){
		$_SESSION['user'] = $db->lastInsertId('public.user_id_seq');		
		header("Location: index.php"); /* Redirect browser */
	}
	else{
		header("Location: createUser.php?error=1");
	}
		
	
	
?>