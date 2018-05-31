<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
</head>
<body>
	<form method="post" action="#">
		<table>
			<tr>
				<td>USERNAME : </td>
				<td><input type="text" name="txtUsername" required /></td>
			</tr>
			<tr>
				<td>PASSWORD : </td>
				<td><input type="password" name="txtPassword" required/></td>
			</tr>
			<tr>
				<td><input type="submit" name="btn_Login" value="Login"/></td>
				<td><input type="submit" name="btn_NewMember" value="New Member" formnovalidate/></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php
if(isset($_COOKIE["user"]))
{
	header('Location:WelcomePage.php');
}
else
{
	if(isset($_POST['btn_Login']))
	{	
		$username = $_POST['txtUsername'];
		$password = $_POST['txtPassword'];
		$con = mysqli_connect("localhost","root","","usersdb");
		$stmt = $con->prepare("SELECT username,password FROM tblusers WHERE username = (?) AND password = (?)");
		$stmt->bind_param("ss", $username,$password);
		$stmt->execute();

		$result = $stmt->get_result();
		if ($result->num_rows == 1) 
		{
			setcookie("user","$username",time()+360);
    		header('Location:WelcomePage.php');
		}
		else
			echo "No Username Password Found";
	
		$stmt->close();
		$con->close();
	}
	else if(isset($_POST['btn_NewMember']))
	{
		header('Location:NewRegister.php');
	}

}
?>