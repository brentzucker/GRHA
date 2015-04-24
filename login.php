<?php

require_once 'page_functions.php';
require_once 'dbconnection.php';

session_start();

open_html("Home");

echo<<<_END
    <div id="slideshow_container">  
	  <div class="slideshow">
	    <ul class="slideshow">
          <li class="show"><img width="940" height="250" src="images/main.png" alt="&quot;Georgia Rural Health Association&quot;" /></li>
          <li><img width="940" height="250" src="http://placehold.it/940x250" alt="&quot;Enter your caption here&quot;" /></li>
        </ul> 
	  </div>	
	</div> 

	<div id="site_content">	
	
	<div class="login-info">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh ligula, iaculis accumsan accumsan eget, ullamcorper eget justo. Pellentesque magna eros, pulvinar eget tortor id, dignissim ornare risus. Nulla sit amet aliquam quam. Quisque tempor felis at justo laoreet facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In id nisl diam. In eros ex, egestas id iaculis eget, consequat in velit.</p>
		<br>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh ligula, iaculis accumsan accumsan eget, ullamcorper eget justo. Pellentesque magna eros, pulvinar eget tortor id, dignissim ornare risus. Nulla sit amet aliquam quam. Quisque tempor felis at justo laoreet facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In id nisl diam. In eros ex, egestas id iaculis eget, consequat in velit.</p>
	</div>
	
		<form action="" method="POST" class="login">
			<fieldset >
			<legend>Login</legend>
			Username: <input type="text" name="userName" placeholder="Username..."><br><br>
			Password: <input type="text" name="password" placeholder="Password..."><br><br>
			<input type="submit" value="Login">
			</fieldset>
		</form>
		
		<form action="" method="POST" class="create">
			<fieldset >
			<legend>Create Account</legend>
			First Name: <input type="text" name="create_fname" placeholder="First Name..."><br><br>
			Last Name: <input type="text" name="create_lname" placeholder="Last Name..."><br><br>
			Username: <input type="text" name="create_userName" placeholder="Username..."><br><br>
			Password: <input type="text" name="create_password" placeholder="Password..."><br><br>
			<input type="number" name="custID" hidden>
			<input type="submit" value="Create Account">
			</fieldset>
		</form>
</div>  	
_END;

close_html();

checkLogin();
createAccount();

function checkLogin()
{	
	if(isset($_POST['userName']) && isset($_POST['password']))
	{
		$un = $_POST['userName'];
		$pw = $_POST['password'];
	
	
		$sql="SELECT * FROM customers WHERE userName='$un' and password='$pw'";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
		
		if($count==1)
		{
			$_SESSION['Developer'];
			header("Location:index.php");
		}
	}
}

function createAccount()
{
	if(isset($_POST['create_userName']) && isset($_POST['create_password']))
	{
		$un = $_POST['create_userName'];
		$pw = $_POST['create_password'];
		$cust = $_POST['custID'];
		$fn = $_POST['create_fname'];
		$ln = $_POST['create_lname'];
		
		$query = "INSERT INTO customers (firstName, lastName, userName, password, customerID) VALUES ('$fn', '$ln','$un', '$pw', '$cust')";
		mysql_query($query);
	}
}



?>
