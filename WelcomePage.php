<!DOCTYPE html>
<html>
<head>
	<title>Welcome Page</title>
</head>
<body>
	<form method="post" action="#">
		
	<?php

	if(isset($_COOKIE["user"]))
	{
		$user = $_COOKIE["user"];
		echo "Welcome, $user"."<br/>";

	}
	else
	{
		header('Location:WelcomePage.php');
	}
	echo '<input type=\'submit\' name=\'btn_Logout\' value=\'Logout\'>';
	if(isset($_POST['btn_Logout']))
	{
		setcookie("user","$user",time()-300);
		header("Refresh:0");
	}
	?>
</body>
</html>