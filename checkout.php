<?php

require_once 'page_functions.php';
require_once 'dbconnection.php';

session_start();

open_html("Checkout");

echo<<<_END

<div id="slideshow_container">
	<div class="slideshow">
	    <ul class="slideshow">
          <li class="show"><img width="940" height="250" src="images/main.png" alt="&quot;Georgia Rural Health Association&quot;" /></li>
          <li><img width="940" height="250" src="images/atl.jpg" alt="&quot;Atlanta&quot;" /></li>
        </ul>
	</div>
</div>

_END;

close_html();

?>