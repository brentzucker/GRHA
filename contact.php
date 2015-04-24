<?php

require_once 'page_functions.php';
require_once 'dbconnection.php';

session_start();

open_html("Contact");

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
		<div class="sidebar_container">       
			<div class="sidebar">
				<div class="sidebar_item">
					<h2>Contact Us</h2>
					<form action="" method="POST">
						Name: <input type="text"><br><br><br>
						Email: <input type="text"><br><br><br>
						Phone: <input type="text"><br><br><br>
						Comments:<br>
						<textarea rows="6" cols="30"></textarea><br><br><br>
						<input type="submit" value="Submit">
					</form>
				</div>
			</div>
		</div>
		
		<div id="content">
			<div class="content_item">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3343.083009758583!2d-83.22885605263602!3d33.08060068289269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1429750516130" width="600" height="450" frameborder="0" style="border:0"></iframe>
			</div>
		</div>
	</div>
_END;
	
 close_html();
 
 ?>
