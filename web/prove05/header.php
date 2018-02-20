<?php
	echo '<div id="header"> <h2>Be Uplifted</h2>';
	if (basename ($_SERVER['PHP_SELF']) == "index.php")
	{
		echo '<a href="logout.php"><button>logout</button></a>';
		echo '<a href="index.php"><button>View Recent</button></a>';
		echo '<a href="index.php?view=p"><button>View Popular</button></a></div>';
		
	}
	else if (basename ($_SERVER['PHP_SELF']) == "login.php" )
	{
		echo '<a href="createUser.php"><button>Create Account</button></a></div>';
		
	}
	else if (basename ($_SERVER['PHP_SELF']) == "createUser.php")
	{
		echo '<a href="login.php"><button>Login</button></a></div>';
	}
	
	$dbUrl = getenv('DATABASE_URL');
	$dbopts = parse_url($dbUrl);
	$dbHost = $dbopts["host"];
	$dbPort = $dbopts["port"];
	$dbUser = $dbopts["user"];
	$dbPassword = $dbopts["pass"];
	$dbName = ltrim($dbopts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

?>