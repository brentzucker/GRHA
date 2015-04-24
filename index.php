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
	  
	  <div class="sidebar_container">       
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>History</h2>
            <p>GHRA is the oldest state rural health association in the country. Founded in 1981, this nonprofit network of healthcare providers, educators, and individuals is united in its commitment to improve the health and healthcare services of rural Georgians.</p>
          </div> 
        </div>   		
       </div>
	   
	  <div id="content">
        <div class="content_item">
		  <h1>The Georgia Rural Health Association </h1> 
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla congue sit amet justo sit amet viverra. Donec ut mi purus. Maecenas dignissim ex eget diam maximus, id gravida ligula placerat. Sed in cursus mi. Duis tincidunt ornare magna, ut dapibus nisl scelerisque a. Pellentesque urna mi, pharetra vitae fermentum id, dapibus non velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id tempor lorem.</p>
		  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla congue sit amet justo sit amet viverra. Donec ut mi purus. Maecenas dignissim ex eget diam maximus, id gravida ligula placerat. Sed in cursus mi. Duis tincidunt ornare magna, ut dapibus nisl scelerisque a. Pellentesque urna mi, pharetra vitae fermentum id, dapibus non velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id tempor lorem.</p>
		  
		</div>
      </div>  
	</div> 	
_END;

close_html();

 ?>
