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
          <li><img width="940" height="250" src="images/atl.jpg" alt="&quot;Atlanta&quot;" /></li>
        </ul> 
	  </div> 	
	</div>  
	
	<div id="site_content">		
	  
	  <div class="sidebar_container">       
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>History</h2>
            <p>GHRA is the oldest state rural health association in the country. Founded in 1981, this nonprofit network of healthcare providers, educators, and individuals is united in its commitment to improve the health and healthcare services of rural Georgians.</p>
			<br>
			<h2>Sponsors</h2>
			<img src="images/bcbs.jpg" />
			<br>
			<img src="images/one.jpg" />
			<br>
			<img src="images/chw.jpg" />
		  </div> 
        </div>   		
       </div>
	   
	  <div id="content">
        <div class="content_item">
		  <h1>The Georgia Rural Health Association </h1> 
          <p>GRHA is governed by a Board of Directors which represent a diverse group of healthcare providers, professionals, policy makers, educators, and consumers. Day-to-day business is handled by the full-time Director, with part-time assistance provided an administrative assistant. 

Our members reflect the diverse nature of rural communities throughout our state. GRHA accomplishes its goals because its network of members reflects the many components of rural healthcare. Our organization includes: </p>
		  <p>Healthcare Professionals Community Health Centers, Hospitals/Boards, Public Health Boards, Area Health Education Centers, Social Services Agencies, Behavioral and Mental Health Professionals, Secondary Schools, Colleges, Universities, and Educators, State Policy Makers, City and County Governments, Industry/Business, Community and Civic Oranizations</p>
		  <img class="photo" src="images/grha2.jpg" />
		</div>
      </div>  
	</div> 	
_END;

close_html();

 ?>
