
<?php
	echo "<div id='header'> <h1>Toaster Outlet</h1>";
	if (basename ($_SERVER['PHP_SELF']) == "browse.php")
	{
		echo "<a href='browse.php'><button class='highlight'>browse</button></a>";
	}
	else
	{
		echo "<a href='browse.php'><button>browse</button></a>";
	}
	if (basename ($_SERVER['PHP_SELF']) == "cart.php")
	{
		echo "<a href='cart.php'><button class='highlight'>cart</button></a>";
		echo "<a href='checkout.php'><button>checkout</button></a>";
	}
	else
	{
		echo "<a href='cart.php'><button>cart</button></a>";
	}
	echo "<br />";
	echo "</div>";
?>