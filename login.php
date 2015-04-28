<?php

require_once 'page_functions.php';
require_once 'dbconnection.php';

session_start();

open_html("Home");

echo<<<_END

<script>
function showHint(str)
{
if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    return;
} else {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET","names.php?q="+str,true);
    xmlhttp.send();
}    
}
</script>

    <div id="slideshow_container">
	  <div class="slideshow">
	    <ul class="slideshow">
          <li class="show"><img width="940" height="250" src="images/main.png" alt="&quot;Georgia Rural Health Association&quot;" /></li>
          <li><img width="940" height="250" src="images/atl.jpg" alt="&quot;Atlanta&quot;" /></li>
        </ul>
	  </div>
	</div>

	<div id="site_content">	
	
	<div class="login-info">
		<p>The Georgia Rural Health Association (GRHA) is the oldest state rural health association in the country. Founded in 1981, this nonprofit network of healthcare providers, educators, and individuals is united in its commitment to improve the health and healthcare services of rural Georgians. Of Georgia’s 159 counties, 108 are considered rural, and with a population of 1.7 million they differ greatly from the urban areas of the state. To help meet their unique healthcare needs, our R.A.I.S.E. 2014 GRHA Legislative Agenda is as follows:</p>
		<br>
		<p>Raise Medicaid Reimbursement Rate, Advocate for Rural Health Safety Net Programs, Invest in Primary Care, Support an increase of $1.00/pack tax on cigarettes, Expand Georgia’s Trauma Care Network.</p>
	</div>
	
	<br />
	
	<h2 class="force-login">You must login or create an account to continue</h2>
	
		<form action="" method="POST" class="login">
			<fieldset >
			<legend>Login</legend>
			Username: <input type="text" name="userName" placeholder="Username..." id="txt1" onkeyup="showHint(this.value)"><br>
			<p>User Names: <span id="txtHint"></span></p><br>
			Password: <input type="password" name="password" placeholder="Password..."><br><br>
			<input type="submit" value="Login">
			</fieldset>
		</form>
		
		<form action="" method="POST" class="create">
			<fieldset >
			<legend>Create Account</legend>
			<span class="red">* </span>First Name: <input type="text" name="create_fname" placeholder="First Name..."><br><br>
			<span class="red">* </span>Last Name: <input type="text" name="create_lname" placeholder="Last Name..."><br><br>
			<span class="red">* </span>Address: <input type="text" name="create_address" placeholder="Address..."><br><br>
			<span class="red">* </span>Username: <input type="email" name="create_userName" placeholder="Username..."><br><br>
			<span class="red">* </span>Password: <input type="password" id="pwd" name="create_password" placeholder="Password..."><br><br>
			<input type="number" name="custID" hidden>
			<input type="submit" name="submit" value="Create Account"><br>
_END;

if(isset($_POST['submit']))
{
	if(!empty($_POST['create_fname']))
	{
		echo '<label class="red"></label>';
		$fname = true;
	}
	else
	{
		echo '<label class="red">Please Enter First Name</label><br>';
		$fname = false;
	}
	
	if(!empty($_POST['create_lname']))
	{
		echo '<label class="red"></label>';
		$lname = true;
	}
	else
	{
		echo '<label class="red">Please Enter Last Name</label><br>';
		$lname = false;
	}
	
	if(!empty($_POST['create_address']))
	{
		echo '<label class="red"></label>';
		$add = true;
	}
	else
	{
		echo '<label class="red">Please Enter Address</label><br>';
		$add = false;
		
	}
	
	if(strlen($_POST['create_userName']) < 5)
	{
		echo '<label class="red">Username must be 5 characters and an Email Address</label><br>';
		$un = false;
	}
	else
	{
		echo '<label class="red"></label>';
		$un = true;
	}
	
	if(strlen($_POST['create_password']) < 6)
	{
		echo '<label class="red">Password must be 6 characters</label><br>';
		$pass = false;
	}
	else
	{
		echo '<label class="red"></label>';
		$pass = true;
	}
}

echo<<<_END
			</fieldset>
		</form>
</div> 
	
_END;

close_html();

if($pass==true && $un==true && $add==true && $fname==true && lname==true)
{
	createAccount();
}

checkLogin();

?>
