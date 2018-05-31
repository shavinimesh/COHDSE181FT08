<html>
<head><title>Index-COHDSE181FTO08</title><head/>
<body>
<h1>Comments</h1>

<form name="comment" method="post" action="#">
<label><h3>Enter Your Name :<h3/><label/>
<label>Name<label/><input type ="text" name= "txt_name"/>
<label><h3>please enter your Comment here :</h3><label/>

<textarea cols="75" rows="20" placeholder="your comment please" name="txt_comment" ></textarea><br>
  <input type="submit" name="btn_comment" value="Submit" />
  
 </form>
 
</body>
</html>
<?php

if(isset($_POST["btn_comment"]))
{     $name = $_POST["txt_name"];
	$comment = $_POST["txt_comment"];
	
	$con= mysqli_connect("localhost","root","");
	mysqli_select_db($con,"assigmentdb");
	$sql = "INSERT INTO tblcomment (name, comment) VALUES('$name','$comment')";
	$result = mysqli_query($con,$sql);
	if($result==1)
	{
	echo"Thanks for your Comment";
	}
}

?>

