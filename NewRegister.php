<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>
	<form method="post" action="#">
		<table>
			<tr>
				<td>Username : </td>
				<td><input type="text" name="txtUsername" required /></td>
			</tr>
			<tr>
				<td>Password : </td>
				<td><input type="password" name="txtPassword" required/></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="btnRegister" value="Register"/></td>
			</tr>
		</table>
	</form>
<?php
if(isset($_POST['btnRegister']))
	{	
		$username = $_POST['txtUsername'];
		$password = $_POST['txtPassword'];
		$con = mysqli_connect("localhost","root","","usersdb");
		$stmt = $con->prepare("INSERT INTO tblusers VALUES(?,?)");
		$stmt->bind_param("ss", $username,$password);
		$stmt->execute();
		$stmt->close();
		$con->close();
		header('Location:Mainpage.php');
	}
?>
</body>
</html>