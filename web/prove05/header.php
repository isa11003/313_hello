<?php
	echo '<div id="header"> <h2>Be Uplifted</h2>';
	echo '<a href="login.php"><button>Login</button></a></div>';
	
	//url: postgres://vioiwqpjaamamo:fbbd47b484391188e149fee848c17ac3321350af1a7f9d7f1e4f24c9fe39db92@ec2-54-235-249-33.compute-1.amazonaws.com:5432/da2aqrlp29fisb
	
	$dbUrl = getenv('DATABASE_URL');
	$dbopts = parse_url($dbUrl);
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

?>