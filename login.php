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
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh ligula, iaculis accumsan accumsan eget, ullamcorper eget justo. Pellentesque magna eros, pulvinar eget tortor id, dignissim ornare risus. Nulla sit amet aliquam quam. Quisque tempor felis at justo laoreet facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In id nisl diam. In eros ex, egestas id iaculis eget, consequat in velit.</p>
		<br>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nibh ligula, iaculis accumsan accumsan eget, ullamcorper eget justo. Pellentesque magna eros, pulvinar eget tortor id, dignissim ornare risus. Nulla sit amet aliquam quam. Quisque tempor felis at justo laoreet facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In id nisl diam. In eros ex, egestas id iaculis eget, consequat in velit.</p>
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
			First Name: <input type="text" name="create_fname" placeholder="First Name..."><br><br>
			Last Name: <input type="text" name="create_lname" placeholder="Last Name..."><br><br>
			Address: <input type="text" name="create_address" placeholder="Address..."><br><br>
			Username: <input type="email" name="create_userName" placeholder="Username..."><br><br>
			Password: <input type="password" id="pwd" name="create_password" placeholder="Password..."><br><br>
			<input type="number" name="custID" hidden>
			<input type="submit" name="submit" value="Create Account">
			</fieldset>
		</form>
</div> 
	
_END;

close_html();
createAccount();
checkLogin();



?>
