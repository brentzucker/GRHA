<?php

require_once 'dbconnection.php';

function open_html($title)
{

echo<<<_END
<!DOCTYPE html> 
<html>

<head>
  <title>$title</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>
</head>

<body>
  <div id="main">		
    <header>	  
	  <nav>
	    <div id="menubar">
          <ul id="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="conferences.php">Conferences</a></li>
            <li><a href="cart.php">Cart</a></li>
			<li><a href="login.php">Log In</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </div>
      </nav>
    </header>
_END;
}

function close_html()
{
	$user;
	if(isset($_SESSION['User']))
	{
		$user = $_SESSION['User'];
	}
	else
		$user = "";
echo<<<_END
	<footer>
		<p>Copyright &copy; 2015 Georgia Rural Health Association | logged in as: $user</p><a href="logout.php">Log Out</a>
    </footer>
	
  </div>
  
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
  
</body>
</html>
_END;
}

function checkLogin()
{	
	if(isset($_POST['userName']) && isset($_POST['password']))
	{
		$un = $_POST['userName'];
		$pw = $_POST['password'];
	
		$sql="SELECT * FROM customers WHERE userName='$un' and password='$pw'";
		$result=mysql_query($sql);
		if (!$result) die("failed".mysql_error());
		$count=mysql_num_rows($result);
		
		if($count==1)
		{
			$_SESSION['User'] = $un;
			header("Location:index.php");
		}
	}
}

function createAccount()
{
	if(isset($_POST['submit']))
	{
		$un = $_POST['create_userName'];
		$pw = $_POST['create_password'];
		$cust = $_POST['custID'];
		$fn = $_POST['create_fname'];
		$ln = $_POST['create_lname'];
		$ad = $_POST['create_address'];
		
		$query = "INSERT INTO customers (customerID, firstName, lastName, address, userName, password) VALUES ('$cust', '$fn', '$ln', '$ad', '$un', '$pw')";
		mysql_query($query);
	}
}

function showCart()
{
	if (isset($_POST['clear']))
	{
		$_SESSION['cart']=array();
		$_SESSION['totalP']=0;
		session_destroy();
		echo "<h2 class='empty-cart'>Your Cart Is Empty. Add Conferences.</h2>";
	}
	else {
		print_order();
	}
	
	if(isset($_POST['checkOut']))
	{
	
	$date = date("Y-m-d");
	
	$price = $_SESSION['totalPrice'];
	
echo<<<_END
			<form action="" method="POST" class="order-form">
				First Name: <input type="text" name="fName"><br><br>
				Last Name: <input type="text" name="lName"><br><br>
				CC Number: <input type="text" name="cc"><br><br>
				<input type="text" name="custID" hidden>
				<input type="text" name="quantity" hidden>
				<input type="date" name="date" value="$date" hidden>
				<input type="text" name="price" value="$price" hidden>
				<input type="submit" name="order" value="Finalize Order">
			</form>
_END;
	}
	
	checkout();
	
}

function checkout()
{
if(isset($_POST['fName']))
		{
			$date = date("Y-m-d");
			$price = $_SESSION['totalPrice'];
			$fname = $_POST['fName'];
			$lname = $_POST['lName'];
		
			$sql = "INSERT INTO orders (date, firstName, lastName, price) VALUES ('$date', '$fname', '$lname', '$price')";
			mysql_query($sql);
			
			echo '<h2 class="center">Your Order Has Been Complete!</h2>';

		}

}

function print_order()
{
	if (isset($_SESSION['cart']))
	{
		echo <<<_END
		<h2>Your Cart</h2>
		<table class="cart-table" style="border-collapse: collapse">
  		<tr>
			<th>Conference Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
  		</tr>
_END;
		foreach ($_SESSION['cart'] as $conference => $values)
		{
			echo "<tr>";
			echo "<td>$values[name]</td>";
			echo "<td>$values[price]</td>";
			echo "<td>$values[quantity]</td>";

			$subtotal = $values['price']*$values['quantity'];
			echo "<td> $subtotal </td>";
			echo "</tr>";
		}
		echo "</table>";

		echo "<b>Total price is $".$_SESSION['totalPrice']."</b>";

		echo <<<_END
		<form name="order" method="post" action="cart.php?clear=1">
	  		<p>
    			<input name="clear" type="submit" value="Clear Cart" />
				<input name="checkOut" type="submit" value="Check Out" />
  			</p>
		</form>
_END;
	}
	else
	{
		echo "<h2 class='empty-cart'>Your Cart Is Empty. Add Conferences.</h2>";
	}
}

function addToCart()
{
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$name = $_POST['name'];
	$conferenceID = $_POST['conferenceID'];

	if (!isset($_SESSION['totalPrice']))
	{
		$_SESSION['totalPrice']= $quantity*$price;
	}
	else
		$_SESSION['totalPrice']+= $quantity*$price;

	if (!isset($_SESSION['cart'][$conferenceID]))
	{
		$_SESSION['cart'][$conferenceID]['price']=$price;
		$_SESSION['cart'][$conferenceID]['quantity']=$quantity;
		$_SESSION['cart'][$conferenceID]['name']=$name;
	}
	else
		$_SESSION['cart'][$conferenceID]['quantity']+=$quantity;

	//echo "<h2 class='empty-cart'>Conferences added to cart, view items in the \"cart\" tab</h2>";
	header("Location:cart.php");
}

function getConferences()
{

$query = "SELECT conferenceID, name, price, location, image FROM  conferences";

$result = mysql_query($query);
if (!$result) die("failed".mysql_error());
$rows=mysql_num_rows($result);

echo '<table class="conference-table">';
	for($i=0;$i<$rows;$i++)
	{
		$row=mysql_fetch_row($result);
	
if($i%4 == 0) //Start new row after 4
echo "<tr>";
echo "<td>";	
echo<<<_END
		<form class="menu" name="menu" method="post" action="cart1.php">
		<p class="menu_title">$row[1]</p>
		<p class="menu_pic"><img src="images/$row[4]" height:200px width: 200px alt="$row[1]" /></p>
		<p class="location">Location: $row[3]</p>
		<p class="menu_price">Price: $row[2]</p>
		<p class="menu_quantity">Quantity: 
		<input name="quantity" type="number" id="textfield" value="1" size="1" />
		</p>
		<p class="menu_button">
		<input name="submit" type="submit" id="button" value="Add to Cart" />
		</p>
  	
			<input name="conferenceID" type="hidden" value="$row[0]"/>
			<input name="name" type="hidden" value="$row[1]"/>
			<input name="price" type="hidden" value="$row[2]"/>
	</form>
_END;
echo "</td>";
	
	if($i%4 == 3)
	{
		echo "</tr>";
	}
}

if(($rows-1)%4!=3)
{
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</div>";
}

}

function isLogin()
{
	if(isset($_SESSION['User']))
	{
		
	}
	else
	{
		header("Location:login.php");
	}
}

?>